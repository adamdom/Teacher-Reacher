var UI = require('ui');
var ajax = require('ajax');

var pinList = [0, 0, 0, 0, 0, 0, 0];
var currentDigit;
var classId = pinList.join("");
var Vibe = require('ui/vibe');
var Vector2 = require('vector2');

//Cards
var windowMain = new UI.Window();

var titleText = new UI.Text({
  position: new Vector2(15,05),
  size: new Vector2(150,150),
  text: 'Teacher Reacher'
});

var cardResults = new UI.Card({
  title:'Statistics',
  scrollable: false
});

var cardResultsA = new UI.Card({
  title:'Statistics',
  scrollable: false
});

var cardResultsV = new UI.Card({
  title:'Statistics',
  scrollable: false
});

var cardResultsK = new UI.Card({
  title:'Statistics',
  scrollable: false
});


var cardInput = new UI.Card({
  title:'Teacher Reacher',
  subtitle:'Please enter the class ID'
});

//Refresh function
var refresh = function() {
    classId = pinList.join("");
    cardInput.body(classId);
    //windowInput.add(inputText);
    //cardResults.body(classId);
    //windowInput.show();
    cardInput.show();
};


//Show the first card
currentDigit = 0;
classId = pinList.join("");
cardInput.body(classId);
windowMain.add(titleText);
windowMain.show();



windowMain.on('click', 'select', function() {
  
  cardInput.show();  
  });


cardInput.on('click', 'select', function(){
  if (currentDigit >= 6){
    refresh();
////////////////////////////////////////////////////  
    
    
    var URL = 'http://teachandtweak.site50.net/' + classId + 'percent.xml';
    
    ajax(
     {url: URL, type: 'text'},
      function(data) {
       var numResult = data;
       var conversion = function (myString) {
         var myIntList = myString.split(" ");
         return myIntList;
       };

       var numList = conversion("" + numResult);

        var cardBody = "Class ID: " + classId + "\n" +
      "Visual: " + numList[0] + "%" + '\n' +
       "Auditory: " + numList[1] + "%" + '\n' + 
       "Kinesthetic: " + numList[2] + "%" + '\n\n' +
       "Overall: " + numList[3] + "%";
        
        var cardBodyV = "Visual: " + numList[0];
        
        var cardBodyA = "Auditory: " + numList[1];
        
        var cardBodyK = "Kinesthetic: " + numList[2];

      cardResults.body(cardBody);
      cardResultsV.body(cardBodyV);
      cardResultsA.body(cardBodyA);
      cardResultsK.body(cardBodyK);
        
      cardResults.show();
    
}, 
  function(error) {
    // Failure!
    console.log('Failed fetching learning data: ' + error);
  }
);
    
       
//////////////////////////////////////////////////////////////////

  }

  else {
    
    currentDigit++;
    //cardInput.subtitle('select pressed');
    refresh();
    
  }
});

cardResults.on('click', 'up', function(){
   var window = new UI.Window();
  var bgRect = new UI.Circle({
  position: new Vector2(72, 72),
  radius: 50,
  backgroundColor: 'white',
});
  var bgRect2 = new UI.Circle({
  position: new Vector2(72, 72),
  radius: 45,
  backgroundColor: 'black',
});
  var i;
  window.add(bgRect);
  window.add(bgRect2);
  for(i = 0; i < 10-5); i++)
    {
      var s = 47*Math.sin((i/5.0)*Math.PI);
      var c = 47*Math.cos((i/5.0)*Math.PI);
      var bgRect4 = new UI.Circle({
      position: new Vector2(72+c, 72+s),
      radius: 16,
        backgroundColor: 'black'});
      window.add(bgRect4);
      var textfield = new UI.text();
    }
  window.show();
});

cardResults.on('click', 'down', function(){
  cardResultsV.show();
});


cardResultsV.on('click', 'up', function(){
  cardResults.show();
});

cardResultsV.on('click', 'down', function(){
  cardResultsA.show();
});

cardResultsA.on('click', 'up', function(){
  cardResultsV.show();
});

cardResultsA.on('click', 'down', function(){
  cardResultsK.show();
});

cardResultsK.on('click', 'up', function(){
  cardResultsA.show();
});

cardResultsK.on('click', 'down', function(){
  cardResults.show();
});

cardResults.on('click', 'back', function(){
  cardInput.show();
  
});

cardResultsV.on('click', 'back', function(){
  cardInput.show();
});
cardResultsA.on('click', 'back', function(){
  cardInput.show();
});
cardResultsK.on('click', 'back', function(){
  
  cardInput.show();
});


cardInput.on('click', 'back', function(){
  if (currentDigit <= 0){
    refresh();
    //cardResults.show();
  }
  else{
    currentDigit--;
    //cardInput.subtitle('back pressed');
    refresh();
  }
});

cardInput.on('click', 'up', function() {
  if (pinList[currentDigit] >= 9){
    pinList[currentDigit] = 9;
    Vibe.vibrate('long');
  }
  else {
    pinList[currentDigit]++;
    refresh();
  }
});

cardInput.on('click', 'down', function() {
  if (pinList[currentDigit] <= 0){
    pinList[currentDigit] = 0;
    Vibe.vibrate('long');
  }
  else {
  pinList[currentDigit]--;
  refresh();
  }
});
