[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Unsplash/functions?utm_source=RapidAPIGitHub_UnsplashFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Unsplash Package
Unsplash
* Domain: [Unsplash](http://unsplash.com)
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Go to [Unsplash](https://unsplash.com) 
1. Register or log in
2. Create a new application at the [Developer Dashboard](https://unsplash.com/developers)



## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Unsplash.getAccessToken
Generate access token

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Unsplash
| apiSecret  | credentials| Api secret obtained from Unsplash
| redirectUri| String     | Redirect URL you set
| code       | String     | Code received from user

## Unsplash.getMe
Get the user’s profile

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token

## Unsplash.updateMe
Update the user’s profile

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| User access token
| username         | String| Username
| firstName        | String| User first name
| lastname         | String| User last name
| email            | String| User email
| url              | String| User url
| location         | String| User location
| bio              | String| User bio
| instagramUsername| String| User Instagram username.

## Unsplash.getPublicUserProfile
Retrieve public details on a given user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| username   | String| Username of the user
| imageWidth | Number| Profile image width in pixels.
| imageHeight| Number| Profile image height in pixels.

## Unsplash.getUserPortfolioLink
Retrieve a single user’s portfolio link.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| username   | String| Username of the user

## Unsplash.getUserPhotos
Retrieve a single user’s photos.

| Field      | Type   | Description
|------------|--------|----------
| accessToken| String | User access token
| username   | String | Username of the user
| page       | Number | Page number to retrieve.
| perPage    | Number | Number of items per page
| orderBy    | Select | How to sort the photos.
| stats      | Boolean| Show the stats for each user’s photo.
| resolution | String | The frequency of the stats. (Optional; default: “days”)
| quantity   | Number | The amount of for each stat. (Optional; default: 30)

## Unsplash.getUsersLikedPhotos
Get a list of photos liked by a user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| username   | String| Username of the user
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page
| orderBy    | Select| How to sort the photos.

## Unsplash.getUsersCollections
Get a list of collections created by the user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| username   | String| Username of the user
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.getUsersStatistics
Retrieve the consolidated number of downloads, views and likes of all user’s photos, as well as the historical breakdown and average of these stats in a specific timeframe (default is 30 days).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| username   | String| Username of the user
| resolution | String| The frequency of the stats. (Optional; default: “days”)
| quantity   | Number| The amount of for each stat. (Optional; default: 30)

## Unsplash.getPhotos
Get a single page from the list of all photos.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page
| orderBy    | Select| How to sort the photos.

## Unsplash.getCuratedPhotos
Get a single page from the list of curated photos.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page
| orderBy    | Select| How to sort the photos.

## Unsplash.getSinglePhoto
Get a single photo full details.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| photoId    | String| Id of the photo

## Unsplash.getRandomPhoto
Retrieve a single random photo, given optional filters.

| Field      | Type   | Description
|------------|--------|----------
| accessToken| String | User access token
| imageWidth | Number | Image width in pixels.
| imageHeight| Number | Image height in pixels.
| collections| List   | Image height in pixels.
| featured   | Boolean| Limit selection to featured photos.
| username   | String | Limit selection to a single user.
| query      | String | Limit selection to photos matching a search term.
| orientation| Select | Filter search results by photo orientation.
| count      | Number | The number of photos to return. (Default: 1; max: 30)

## Unsplash.getPhotosStatistics
Get a single photo statistics

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| photoId    | String| Id of the photo
| resolution | String| The frequency of the stats. (Optional; default: “days”)
| quantity   | Number| The amount of for each stat. (Optional; default: 30)

## Unsplash.getPhotosDownloadLink
Get a single photo download link

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| photoId    | String| Id of the photo

## Unsplash.updatePhoto
Update a photo on behalf of the logged-in user.

| Field               | Type   | Description
|---------------------|--------|----------
| accessToken         | String | User access token
| photoId             | String | Id of the photo
| coordinates         | Map    | The photo location’s latitude and longitude coma separated
| locationName        | String | The photo location’s name
| locationCity        | String | The photo location’s city
| locationCountry     | String | The photo location’s country
| locationConfidential| Boolean| The photo location’s confidentiality
| make                | String | Camera’s brand
| model               | String | Camera’s model
| exposureTime        | String | Camera’s exposure time
| apertureValue       | String | Camera’s aperture value
| isoSpeedRatings     | String | Camera’s iso speed ratings

## Unsplash.likePhoto
Like single photo

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| photoId    | String| Id of the photo

## Unsplash.unlikePhoto
Unlike single photo

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| photoId    | String| Id of the photo

## Unsplash.searchPhotos
Get a single page of photo results for a query.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| collections| List  | Image height in pixels.
| query      | String| Limit selection to photos matching a search term.
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.searchCollections
Get a single page of collections results for a query.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| query      | String| Limit selection to collections matching a search term.
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.searchUsers
Get a single page of users results for a query.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| query      | String| Limit selection to users matching a search term.
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.getCollections
Get a single page from the list of all collections.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.getFeaturedCollections
Get a single page from the list of featured collections.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.getCuratedCollections
Get a single page from the list of curated collections.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token
| page       | Number| Page number to retrieve.
| perPage    | Number| Number of items per page

## Unsplash.getSingleCollection
Get a single collection by Id

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| String| Collection id

## Unsplash.getCollectionsPhotos
Get a single collection photos

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| String| Collection id
| page        | Number| Page number to retrieve.
| perPage     | Number| Number of items per page

## Unsplash.getCollectionsRelatedCollections
Retrieve a list of collections related to this one.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| String| Collection id
| page        | Number| Page number to retrieve.
| perPage     | Number| Number of items per page

## Unsplash.createCollection
Create a new collection.

| Field      | Type   | Description
|------------|--------|----------
| accessToken| String | User access token
| title      | String | Collection title
| description| String | Collection description
| private    | Boolean| Whether to make this collection private. 

## Unsplash.updateCollection
Update existing collection.

| Field       | Type   | Description
|-------------|--------|----------
| accessToken | String | User access token
| collectionId| Number | Collection id
| title       | String | Collection title
| description | String | Collection description
| private     | Boolean| Whether to make this collection private. 

## Unsplash.addPhotoToCollection
Add photo to existing collection.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| Number| Collection id
| photoId     | String| Photo id

## Unsplash.addPhotoToCollection
Add photo to existing collection.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| Number| Collection id
| photoId     | String| Photo id

## Unsplash.removePhotoFromCollection
Remove photo from existing collection.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| Number| Collection id
| photoId     | String| Photo id

## Unsplash.deleteCollection
Delete existing collection.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| User access token
| collectionId| Number| Collection id

## Unsplash.getUnsplashCounts
Get a list of counts for all of Unsplash.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| User access token

