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

  for (let i = 0; i < array2.length; i++) {
    let value = array2[i];

    let fix = array2[i];
    fix.replace(value, "");
    fix = "\"" + value + "\"";
    array2[i] = fix;
  }

  document.getElementById("test").innerHTML = array;
  document.getElementById("test2").innerHTML = array2;


}


function shufflestart() {
  shuffle(match_id, mongodbId);
}




// mätserie 1: titta responstid enbart -mongo
function seriesOne() {
  // Start Timer for query in Javascript
  index = (Math.floor(Math.random() * 1000))

    // Doing MongoDB calculations
    let startMongo = performance.now();
    $("#seriesOneBtn").append($('<div>').load("SeriesOneMongoDB.php", { var1: index }, function () {
      //Get The result Object from query
      let MongoDB = JSON.parse(localStorage.getItem("MongoDBObject"));
      console.log(MongoDB);
      // Get Time for transforming finding from query into Javascript Object
      let EndMongo = Math.floor(performance.now() - startMongo);
      document.getElementById("MongoDBFullResult").innerHTML += EndMongo + ",";
    }))


  //Doing Cassandra calculations
  let startCassandra = performance.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesOneCassandraDB.php", { var1: index }, function () {
    //Get The result Object from query
    let cassandra = JSON.parse(localStorage.getItem("CassandraDBObject"));
    console.log(cassandra);
    // Get Time for transforming finding from query into Javascript Object
    let EndCassandra = Math.floor(performance.now() - startCassandra);
    document.getElementById("CassandraFullResult").innerHTML += EndCassandra + ",";
  }));

}

function seriesTwoStart() {


  let p1 = new Promise((resolve, reject) => {
    seriesFour()
  })
  let p2 = new Promise((resolve, reject) => {
    seriesFour()
  })
  let p3 = new Promise((resolve, reject) => {
    seriesFour()
  })
  let p4 = new Promise((resolve, reject) => {
    seriesFour()
  })
  let p5 = new Promise((resolve, reject) => {
    seriesFour()
  })
}

function seriesThreeStart() {


  let p1 = new Promise((resolve, reject) => {
    seriesOne()
  })
  let p2 = new Promise((resolve, reject) => {
    seriesOne()
  })
  let p3 = new Promise((resolve, reject) => {
    seriesOne()
  })
  let p4 = new Promise((resolve, reject) => {
    seriesOne()
  })
  let p5 = new Promise((resolve, reject) => {
    seriesOne()
  })
}

function seriesFour() {
  // Start Timer for query in Javascript


  index = (Math.floor(Math.random() * 1000))




  // Doing MongoDB calculations
  const startMongo = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesFourMongoDB.php", { var1: index }, function () {
    //Get The result Object from query
    let MongoDB = JSON.parse(localStorage.getItem("MongoDBObject"));
    console.log(MongoDB);
    // Get Time for transforming finding from query into Javascript Object
    const EndMongo = Date.now() - startMongo;
    document.getElementById("MongoDBFullResult").innerHTML += EndMongo + ",";
  }));


  const startCassandra = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesFourCassandraDB.php", { var1: index }, function () {
    //Get The result Object from query
    let cassandra = JSON.parse(localStorage.getItem("CassandraDBObject"));
    let fixCassandra = cassandra[0].chat.values[0];
    console.log(cassandra);
    console.log(fixCassandra);
    // Get Time for transforming finding from query into Javascript Object
    const EndCassandra = Date.now() - startCassandra;
    document.getElementById("CassandraFullResult").innerHTML += EndCassandra + ",";
  }));

}



function seriesThree() {
  // Start Timer for query in Javascript

  index = (Math.floor(Math.random() * 1000))

  // Doing MongoDB calculations
  const startMongo = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesOneMongoDB.php", { var1: index }, function () {
    //Get The result Object from query
    let MongoDB = JSON.parse(localStorage.getItem("MongoDBObject"));
    console.log(MongoDB);
    // Get Time for transforming finding from query into Javascript Object
    const EndMongo = Date.now() - startMongo;
    document.getElementById("MongoDBFullResult").innerHTML += EndMongo + ",";
  }));


  //Doing Cassandra calculations
  const startCassandra = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesOneCassandraDB.php", { var1: index }, function () {
    //Get The result Object from query
    let cassandra = JSON.parse(localStorage.getItem("CassandraDBObject"));
    console.log(cassandra);
    // Get Time for transforming finding from query into Javascript Object
    const EndCassandra = Date.now() - startCassandra;
    document.getElementById("CassandraFullResult").innerHTML += EndCassandra + ",";
  }));
}

function seriesThreeTest() {
  index = (Math.floor(Math.random() * 1000))

  // Doing MongoDB calculations
  const startMongo = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesOneMongoDB.php", { var1: index }, function () {
    //Get The result Object from query
    let MongoDB = JSON.parse(localStorage.getItem("MongoDBObject"));
    console.log(MongoDB);
    // Get Time for transforming finding from query into Javascript Object
    const EndMongo = Date.now() - startMongo;
    document.getElementById("MongoDBFullResult").innerHTML += EndMongo + ",";
  }));


  //Doing Cassandra calculations
  const startCassandra = Date.now();
  $("#seriesOneBtn").append($('<div>').load("SeriesOneCassandraDB.php", { var1: index }, function () {
    //Get The result Object from query
    let cassandra = JSON.parse(localStorage.getItem("CassandraDBObject"));
    console.log(cassandra);
    // Get Time for transforming finding from query into Javascript Object
    const EndCassandra = Date.now() - startCassandra;
    document.getElementById("CassandraFullResult").innerHTML += EndCassandra + ",";
  }));
}