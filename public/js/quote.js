$(document).ready(function() {
  getQuote();
});

function getQuote() {
  $.ajax({
    type: "POST",
    crossDomain: true,
    url: "https://api.forismatic.com/api/1.0/",
    data: {
      method: "getQuote",
      format: "jsonp",
      lang: "en"
    },
    dataType: "jsonp",
    jsonp: "jsonp",
    jsonpCallback: "parseQuote"
  });
}

function parseQuote(response) {
  $('#quote').text(response.quoteText);
  $('#author').text(response.quoteAuthor);
  var text = "'" + response.quoteText + "' - " + response.quoteAuthor;
}