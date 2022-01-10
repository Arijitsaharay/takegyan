<script src="https://apis.google.com/js/api.js"></script>

  /**
   * Sample JavaScript code for calendar.events.insert
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://www.googleapis.com/auth/calendar https://www.googleapis.com/auth/calendar.events"})
        .then(function() { console.log("Sign-in successful"); },
              function(err) { console.error("Error signing in", err); });
  }
  function loadClient() {
    gapi.client.setApiKey("AIzaSyAoBPtmtfcGGSdHdpzcCNj5-z2E9B4MGe8");
    return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/calendar/v3/rest")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded and sign-in is complete before calling this method.
  function execute() {
    var data="08-01-2022";
    var starttime="10:00";
    var endtime="15:00";

    var summary="Query Name";
    var startdate="2022-01-09T10:00:00";
    var enddate="2022-01-09T15:00:00";
    var date = document.getElementById("date").value;
    console.log(date);

    return gapi.client.calendar.events.insert({
            "calendarId": "primary",
            "conferenceDataVersion": 1,
            "resource": {
                "end": {
                'dateTime': enddate,
                'timeZone': 'Asia/Kolkata'
                },
                "start": {
                'dateTime': startdate,
                'timeZone': 'Asia/Kolkata'
                },
                "conferenceData": {
                "createRequest": {
                    "conferenceSolutionKey": {
                    "type": "hangoutsMeet"
                    },
                    "requestId": "gys-dadq-fsuz"
                }
                },
                "summary": summary
            }
            })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response);
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: "528241827771-edbqpg204t3ti7cdou2sri4koq8pak9u.apps.googleusercontent.com"});
  });