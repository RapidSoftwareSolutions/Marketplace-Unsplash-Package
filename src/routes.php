       <?php
       $routes = [
       'getUnsplashCounts',
       'deleteCollection',
       'removePhotoFromCollection',
       'addPhotoToCollection',
       'updateCollection',
       'createCollection',
       'getCollectionsRelatedCollections',
       'getCollectionsPhotos',
       'getSingleCollection',
       'getCuratedCollections',
       'getFeaturedCollections',
       'getCollections',
       'searchUsers',
       'searchCollections',
       'searchPhotos',
       'unlikePhoto',
       'likePhoto',
       'updatePhoto',
       'getPhotosDownloadLink',
       'getPhotosStatistics',
       'getRandomPhoto',
       'getSinglePhoto',
       'getCuratedPhotos',
       'getPhotos',
       'getUsersStatistics',
       'getUsersCollections',
       'getUsersLikedPhotos',
       'getUserPhotos',
       'getUserPortfolioLink',
       'getPublicUserProfile',
       'updateMe',
       'getMe',
        'getAccessToken',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

