<?php
$app->post('/api/Unsplash/updatePhoto', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'photoId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . '/photos/' . $post_data['args']['photoId'];

    //requesting remote API
    $client = new GuzzleHttp\Client();
    $body = [];
    if (!empty($post_data['args']['coordinates'])) {
        $body['location']['latitude'] = explode(',', $post_data['args']['coordinates'])[0];
        $body['location']['longitude'] = explode(',', $post_data['args']['coordinates'])[1];
    }
    if (!empty($post_data['args']['locationName'])) {
        $body['location']['name'] = $post_data['args']['locationName'];
    }
    if (!empty($post_data['args']['locationCity'])) {
        $body['location']['city'] = $post_data['args']['locationCity'];
    }
    if (!empty($post_data['args']['locationCountry'])) {
        $body['location']['country'] = $post_data['args']['locationCountry'];
    }
    if (!empty($post_data['args']['locationConfidential'])) {
        $body['location']['confidential'] = $post_data['args']['locationConfidential'];
    }
    if (!empty($post_data['args']['make'])) {
        $body['exif']['make'] = $post_data['args']['make'];
    }
    if (!empty($post_data['args']['model'])) {
        $body['exif']['model'] = $post_data['args']['model'];
    }
    if (!empty($post_data['args']['exposureTime'])) {
        $body['exif']['exposure_time'] = $post_data['args']['exposureTime'];
    }
    if (!empty($post_data['args']['apertureValue'])) {
        $body['exif']['aperture_value'] = $post_data['args']['apertureValue'];
    }
    if (!empty($post_data['args']['isoSpeedRatings'])) {
        $body['exif']['iso_speed_ratings'] = $post_data['args']['isoSpeedRatings'];
    }

    try {

        $resp = $client->request('PUT', $query_str, [
            'headers' => [
                'Authorization' => 'Bearer ' . $post_data['args']['accessToken']
            ],
            'json' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});