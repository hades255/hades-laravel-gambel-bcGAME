console.log('service.js is registered');

self.addEventListener('activate', async () => {
    console.log('service worker activate');
    try {
        const applicationServerKey = urlB64ToUint8Array(
            'BDMRNmPyq7HUTDnjS7giH4TiKnEzCLz-yPN3MjM3EPYnP_qMyvqZtqaC-PiIsottkiI745_8RozbCEVTHGivTDM'
        );
        const options = { applicationServerKey, userVisibleOnly: true };
        const subscription = await self.registration.pushManager.subscribe(options);
        const response = await saveSubscription(subscription);
        console.log(response);
    } catch (err) {
        console.error('Error', err);
    }
});

self.addEventListener('push', function(event) {
    if (event.data) {
        console.log('Push event!! ', event.data.text());
        showLocalNotification("UpTouch", decodeURIComponent(escape(event.data.text())),  self.registration);
    } else {
        console.log('Push event but no data');
    }
});

const showLocalNotification = (title, body, swRegistration) => {
    const options = {
        body
    };
    swRegistration.showNotification(title, options);
};

const saveSubscription = async subscription => {
    const SERVER_URL = 'http://uptouch.ru:49300/save-subscription';
    const response = await fetch(SERVER_URL, {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(subscription)
    });
    return response.json();
};

const urlB64ToUint8Array = base64String => {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
    const rawData = atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i) outputArray[i] = rawData.charCodeAt(i);
    return outputArray;
};
