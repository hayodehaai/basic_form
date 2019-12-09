document.getElementById("edit-birthday").onchange = function() {calculateAge()};
function calculateAge() {
    var birthday = document.getElementById("edit-birthday").value;
    // parse a date in yyyy-mm-dd format
    var parts = birthday.match(/(\d+)/g);
      // make date from birthday
    birthday = new Date(parts[0], parts[1]-1, parts[2]);
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs); 
    var age =  Math.abs(ageDate.getUTCFullYear() - 1970);
    document.getElementById("edit-age").value = age;
}