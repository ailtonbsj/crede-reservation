const version = '1.0.2';
const appName = 'crede-reservation';

var cacheList = [
  '/',
  "index.php"
]

var cacheStorageKey = `${appName}-${version}`;
console.log('Running Service Work ' + cacheStorageKey);

self.addEventListener('install', function (e) {
  console.log('Cache event!')
  e.waitUntil(
    caches.open(cacheStorageKey).then(function (cache) {
      console.log('Adding to Cache:', cacheList)
      return cache.addAll(cacheList)
    }).then(function () {
      console.log('Skip waiting!')
      return self.skipWaiting()
    })
  )
})

self.addEventListener('activate', function (e) {
  console.log('Activate event');
  // e.waitUntil(
  //   Promise.all(
  //     caches.keys().then(cacheNames => {
  //       return cacheNames.map(name => {
  //         if (name !== cacheStorageKey) {
  //           return caches.delete(name)
  //         }
  //       })
  //     })
  //   ).then(() => {
  //     console.log('Clients claims.')
  //     return self.clients.claim()
  //   })
  // )
  e.waitUntil(self.clients.claim());
})

self.addEventListener('fetch', function (e) {
  // console.log('Fetch event:', e.request.url)
  e.respondWith(
    caches.match(e.request).then(function (response) {
      if (response != null) {
        console.log('Using cache for:', e.request.url)
        return response
      }
      console.log('Fallback to fetch:', e.request.url)
      return fetch(e.request.url)
    })
  )
})