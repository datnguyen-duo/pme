import { type } from "jquery";

export default () => {
  const mapData = site_data.map;

  function init() {
    if (!mapData) {
      return;
    }
    var pin = mapData.pin
        ? mapData.pin.url
        : site_data.themeurl + "/assets/pin.png",
      pin_highlighted = mapData.pin_highlighted
        ? mapData.pin_highlighted.url
        : site_data.themeurl + "/assets/pin-highlighted.png",
      zoom_level = mapData.zoom_level ? mapData.zoom_level : 5;
    mapboxgl.accessToken = site_data.access_token;
    const map = new mapboxgl.Map({
      container: "map",
      style: mapData.style,
      center: [mapData.center_point.longitude, mapData.center_point.latitude],
      zoom: zoom_level,
    });
    if (mapData["show_controls"]) {
      map.addControl(new mapboxgl.NavigationControl());
    }
    map.scrollZoom.disable();
    const locations = [
      {
        name: mapData.center_point.name,
        lat: mapData.center_point.latitude,
        lon: mapData.center_point.longitude,
        type1: mapData.center_point.details[0]?.type,
        type2: mapData.center_point.details[1]?.type,
        expiration1: mapData.center_point.details[0]?.expiration_date,
        expiration2: mapData.center_point.details[1]?.expiration_date,
      },
      ...mapData.points.map((point) => {
        return {
          name: point.name,
          lat: point.latitude,
          lon: point.longitude,
          type1: point.details[0]?.type,
          type2: point.details[1]?.type,
          expiration1: point.details[0]?.expiration_date,
          expiration2: point.details[1]?.expiration_date,
        };
      }),
    ];

    const renderMapItems = (_locations) =>
      (document.getElementById("map-items").innerHTML = _locations
        .map(
          (el, id) =>
            `<div class="map-button-container"><button id="map-item-button-${id}" class='clean-button map-item-button headline-3'><div class="circle-list-item">${
              id + 1
            }</div> ${el.name}</button></div>`
        )
        .join(" ")
        .toString());

    const _locations = locations.filter((location) => {
      return location.name !== "center-point";
    });

    map.on("load", function () {
      map.loadImage(pin, (error, image) => {
        if (error) {
          throw error;
        }
        map.addImage("pin", image);

        map.addSource("locations", {
          type: "geojson",
          data: {
            type: "FeatureCollection",
            features: createFeatures(_locations),
          },
        });
        map.addSource("locations-number", {
          type: "geojson",
          data: {
            type: "FeatureCollection",
            features: createFeatures(_locations),
          },
        });

        renderMapItems(_locations);
        _locations.forEach((location, id) => {
          const button = document.getElementById(`map-item-button-${id}`);
          if (button) {
            button.addEventListener("click", () => {
              highlightItem(location.name, id + 1);
            });
          }
        });
        const locationsLoaded = map.getLayer("location-highlighted")
          ? true
          : false;
        if (_locations.length > 0) {
          setTimeout(() => {
            const firstButton = document.getElementById("map-item-button-0");
            if (firstButton) {
              firstButton.click();
            }
          }, 500);
        }
        map.addLayer(
          {
            id: "locations",
            source: "locations",
            type: "symbol",
            layout: {
              "icon-image": "pin",
              "icon-size": 1,
              "text-field": ["get", "label"],
              "text-font": ["Arial Unicode MS Bold"],
              "text-offset": [0, -0.05],
              "text-size": 12,
              // "text-allow-overlap": true,
              // "text-ignore-placement": true,
              // "icon-allow-overlap": true,
              // "icon-ignore-placement": true,
            },
            paint: {
              "text-color": "#ffffff",
            },
          },
          locationsLoaded ? "location-highlighted" : undefined
        );

        map.on("mouseenter", "locations", () => {
          map.getCanvas().style.cursor = "pointer";
        });

        map.on("mouseleave", "locations", () => {
          map.getCanvas().style.cursor = "";
        });

        map.on("click", "locations", (e) => {
          if (!e.features[0]) return;
          highlightItem(
            e.features[0].properties.name,
            e.features[0].properties.label
          );
        });
      });

      map.loadImage(pin_highlighted, (error, image) => {
        if (error) return;
        map.addImage("pin-highlighted", image);

        map.addSource("location-highlighted", {
          type: "geojson",
          data: {
            type: "FeatureCollection",
            features: [],
          },
        });
        map.addSource("location-highlighted-number", {
          type: "geojson",
          data: {
            type: "FeatureCollection",
            features: [],
          },
        });

        map.addLayer({
          id: "location-highlighted",
          source: "location-highlighted",
          type: "symbol",

          layout: {
            "icon-image": "pin-highlighted",
            "icon-size": 1.05,
            "text-field": ["get", "label"],
            "text-font": ["Arial Unicode MS Bold"],
            "text-offset": [0, -0.05],
            "text-size": 12,
            // "text-allow-overlap": true,
            // "text-ignore-placement": true,
            // "icon-allow-overlap": true,
            // "icon-ignore-placement": true,
          },
          paint: {
            "text-color": "#3E5C6C",
          },
        });
      });
    });

    const createFeatures = (locations, label) => {
      return locations.map((location, id) => {
        return {
          type: "Feature",
          geometry: {
            type: "Point",
            coordinates: [location.lon, location.lat],
          },
          properties: {
            label: label ? label.toString() : `${id + 1}`,
            name: location.name,
            category: location.category,
          },
        };
      });
    };

    const highlightItem = (id, label) => {
      const highlighted = map.getSource("location-highlighted");
      const text = map.getSource("location-highlighted-number");

      if (!highlighted || !text) return;

      const location = locations.find((loc) => loc.name === id);
      if (!location) return;

      const featureData = {
        type: "FeatureCollection",
        features: createFeatures([location], label),
      };

      highlighted.setData(featureData);
      text.setData(featureData);

      const popup = document.getElementById("map-popup"),
        title = document.getElementById("map-popup-title"),
        type1 = document.getElementById("map-popup-type-1"),
        type2 = document.getElementById("map-popup-type-2"),
        expiration1 = document.getElementById("map-popup-expiration-1"),
        expiration2 = document.getElementById("map-popup-expiration-2");

      popup.style.display = "grid";
      title.textContent = location.name;
      type1.textContent = location.type1 ? "Type: " + location.type1 : "";
      type2.textContent = location.type2 ? "Type: " + location.type2 : "";
      expiration1.textContent = location.expiration1
        ? "Exp. Date: " + location.expiration1
        : "";
      expiration2.textContent = location.expiration2
        ? "Exp. Date: " + location.expiration2
        : "";

      map.fitBounds(
        new mapboxgl.LngLatBounds(
          [location.lon, location.lat],
          [location.lon, location.lat]
        ),
        {
          maxZoom: zoom_level,
        }
      );

      document.querySelectorAll(".map-button-container").forEach((item) => {
        item.classList.remove("active");
      });
      document
        .querySelectorAll(".map-button-container")
        [label - 1].classList.add("active");
    };

    const unhighlightItem = () => {
      document.getElementById("map-popup").style.display = "none";
      map.getSource("location-highlighted").setData({
        type: "FeatureCollection",
        features: [],
      });
      map.getSource("location-highlighted-number").setData({
        type: "FeatureCollection",
        features: [],
      });
    };
  }

  return Object.freeze({
    init,
  });
};
