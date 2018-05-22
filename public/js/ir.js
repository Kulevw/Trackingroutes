function getMap() {
    let map = L.map('map').setView([57.10355, 65.59042], 5);
    let tile = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);
    map.scrollWheelZoom.disable();
    return map;
}

function getEditableMap() {
    let map = getMap();
    let options = {
        position: 'topleft',
        drawMarker: true,
        drawPolyline: false,
        drawRectangle: false,
        drawPolygon: false,
        drawCircle: false,
        cutPolygon: false,
        editMode: true,
        removalMode: false,
    };
    map.pm.addControls(options);
    return map;
}