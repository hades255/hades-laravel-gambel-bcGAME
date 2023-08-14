function onload() {
console.log("%cСТОП!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЭта функция браузера для разработчиков. Если кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;")
console.log('\n'.repeat('2'));
window.onerror = null;
var now = new Date();
setInterval(function() {
console.clear();
console.log("%cСТОП!","color: red; font-size: 42px; font-weight: 700"), console.log("%cЭта функция браузера для разработчиков. Если кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;"), console.log('\n'.repeat('2')), console.log("This is very fast executable code ($)"),   console.log("Secure session successfully started (*)"),   console.log("Session start time: "+ now.toString());
}, 600);
	if (location.protocol !== "https:") {
  location.protocol = "https:";
}
else
{
  console.log("Secure session started (*)");
}
};