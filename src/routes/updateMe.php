<?php
$app->post('/api/Unsplash/updateMe', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . '/me';
    $body = [];
    if (!empty($post_data['args']['username'])) {
        $body['username'] = $post_data['args']['username'];
    }
    if (!empty($post_data['args']['firstName'])) {
        $body['first_name'] = $post_data['args']['firstName'];
    }
    if (!empty($post_data['args']['lastName'])) {
        $body['last_name'] = $post_data['args']['lastName'];
    }
    if (!empty($post_data['args']['email'])) {
        $body['email'] = $post_data['args']['email'];
    }
    if (!empty($post_data['args']['url'])) {
        $body['url'] = $post_data['args']['url'];
    }
    if (!empty($post_data['args']['location'])) {
        $body['location'] = $post_data['args']['location'];
    }
    if (!empty($post_data['args']['bio'])) {
        $body['bio'] = $post_data['args']['bio'];
    }
    if (!empty($post_data['args']['instagramUsername'])) {
        $body['instagram_username'] = $post_data['args']['instagramUsername'];
    }


    //requesting remote API
    $client = new GuzzleHttp\Client();

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