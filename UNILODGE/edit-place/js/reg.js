// Initialize and add the map
let map;
let formDoc = document.getElementById("cordform");
let cancel = document.getElementById("cancelBtn");
let confirm = document.getElementById("confirmBtn");

async function initMap() {
  
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, pinElement } = await google.maps.importLibrary("marker");

  //load the positions from DB here
  const nsbm = {lat: 6.821808982446021, lng:80.04247860537619} //keep this solid

  // The map, centered at First Position Element
  map = new Map(document.getElementById("map"), {
    zoom: 15,
    center: nsbm,
    mapId: "0002", // 
  });


  map.addListener("click", (e) => {

    let cordinates = e.latLng.toJSON();
    //console.log(cordinates);

    //thos code generates a marker in the selected cordinates
    const marker = new AdvancedMarkerElement({
        map: map,
        position: cordinates,
      });

    cancel.addEventListener("click", () => {
        marker.setMap(null);
        cordinates = null;
    });

    confirm.addEventListener("click", () => {
        formDoc.action = `register.php?lat=${cordinates.lat}&lng=${cordinates.lng}`;
        //console.log(cordinates);
    });

    

    


  });

  





//   //-----Marker Engine----

//   // marker configuration - 
//   //JSON Data Unit --> {label : "place name", : position:{lat: <lat cordinates>, lng: <lng cordinates>}}
//   const dirPath = "./lodges/";
//   const markers = [
//     //example lodges 
//     {label:"Sadev Lodge", position:{lat: 6.824353438381775, lng:80.05162072433872}, page:`${dirPath}sadevLodge.html`},
//     {label:'lotus lodge',position:{lat:6.828064713299053, lng:80.04358554301088}, page:`${dirPath}lotusLodge.html`}
//     ]

//   markers.forEach((mark) => {

//     const marker = new AdvancedMarkerElement({
//         map: map,
//         position: mark.position,
//         title: mark.label,
        
//       });

//       marker.addListener("click", () => {
//         //window.alert("Marker clicked!");
//         window.location.href = mark.page;

//       });

//   });

  
  
}

initMap();