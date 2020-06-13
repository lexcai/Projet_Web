function search() {
  var terms = document.getElementById("terms").value;
  console.log(terms);
    axios.get("https://www.googleapis.com/books/v1/volumes?q=" + terms)
      .then(response => {
    var results = response.data.items;
      console.log(results.length);
    var ul = document.getElementById("results");
    ul.innerText = "";
    for (var i=0; i<results.length; i++) {
      var title = results[i].volumeInfo.title;
      console.log(title)
      var li = document.createElement("li");
      li.innerText = title;
      ul.appendChild(li);
    }
  });
  document.getElementById('results_message').style.display = "block";
}