<?php
$app->post('/api/Unsplash/getRandomPhoto', function ($request, $response, $args) {
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
    $query_str = $settings['api_url'] . '/photos/random';
    $body = [];
    if (!empty($post_data['args']['imageWidth'])) {
        $body['w'] = $post_data['args']['imageWidth'];
    }
    if (!empty($post_data['args']['imageHeight'])) {
        $body['h'] = $post_data['args']['imageHeight'];
    }
    if (!empty($post_data['args']['collections'])) {
        $body['collections'] = implode(',', $post_data['args']['collections']);
    }  if (!empty($post_data['args']['collections'])) {
        $body['collections'] = implode(',', $post_data['args']['collections']);
    }
    if (!empty($post_data['args']['featured'])) {
        $body['featured'] = $post_data['args']['featured'];
    }
    if (!empty($post_data['args']['username'])) {
        $body['username'] = $post_data['args']['username'];
    }
    if (!empty($post_data['args']['query'])) {
        $body['query'] = $post_data['args']['query'];
    }
    if (!empty($post_data['args']['orientation'])) {
        $body['orientation'] = $post_data['args']['orientation'];
    }
    if (!empty($post_data['args']['count'])) {
        $body['count'] = $post_data['args']['count'];
    }

    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'headers' => [
                'Authorization' => 'Bearer ' . $post_data['args']['accessToken']
            ],
            'query' => $body
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