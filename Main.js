function shuffle(array, array2) {
    let currentIndex = array.length, temporaryValue, randomIndex;
    let currentIndex2 = array2.length, temporaryValue2, randomIndex2;
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
  
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
      // And swap it with the current element.

      temporaryValue = array[currentIndex];
      temporaryValue2 = array2[currentIndex]

      array[currentIndex] = array[randomIndex];
      array2[currentIndex] = array2[randomIndex];


      array[randomIndex] = temporaryValue;
      array2[randomIndex] = String(temporaryValue2);
    }

    for(let i = 0; i< array2.length; i++){
        let value = array2[i];

        let fix = array2[i];
        fix.replace(value, "");
        fix = "\""+value+"\"";
        array2[i] = fix;
    }

  document.getElementById("test").innerHTML = array;
  document.getElementById("test2").innerHTML = array2;
  

  }
  

function shufflestart(){
  shuffle(match_id,mongodbId);
}
// mätserie 1: titta responstid enbart -mongo
function seriesOne(){
  // Start Timer for query in Javascript
  const start = Date.now();

  // Do query in Php and save the result Object in localstorage
  $( "#seriesOneBtn" ).load( "SeriesOneMongoDB.php", function(){
    //Get The result Object from query
    let MongoDB = JSON.parse(localStorage.getItem("MongoDBObject"));
    console.log(MongoDB);

    // Get Time for transforming finding from query into Javascript Object
    const millis = Date.now() - start;
  });
  
}