const firebaseConfig = {
  apiKey: "AIzaSyAVc3iDkGj0Bxf30ZcfBWr2MkfOvaBE5Fo",
  authDomain: "test-firebase-c01dd.firebaseapp.com",
  databaseURL: "https://test-firebase-c01dd.firebaseio.com",
  projectId: "test-firebase-c01dd",
  storageBucket: "test-firebase-c01dd.appspot.com",
  messagingSenderId: "1027363462932",
  appId: "1:1027363462932:web:44ab219e2981d90b796c01"
};
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

messaging.requestPermission().then(function() {
  console.log('Notification permission granted.');
  return messaging.getToken();
  // TODO(developer): Retrieve an Instance ID token for use with FCM.
  // ...
}).then(function(token) {
  console.log(token);

}).catch(function(err) {
  console.log('Unable to get permission to notify.', err);
});

messaging.onMessage(function(payload) {
  console.log("Message received. ", payload);
});