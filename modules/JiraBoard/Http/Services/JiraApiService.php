<?php

namespace Modules\JiraBoard\Http\Services;

use AllowDynamicProperties;
use Illuminate\Support\Facades\Http;
use Exception;

#[AllowDynamicProperties] class JiraApiService
{
    protected string $email;
    protected string $password;
    protected array $headers;
    protected string $requestUrl;
    protected string $baseUrl;

    public function __construct()
    {
        $this->email      = env('JIRA_API_EMAIL');
        $this->baseUrl    = env('JIRA_API_BASE_URL');
        $this->headers    = array('Accept' => 'application/json');
        $this->password   = env('JIRA_API_PASS');
        $this->requestUrl = env('JIRA_API_REQUEST_URL');
        $this->finalUrl   = $this->baseUrl . $this->requestUrl;
    }

    /**
     * HTTP Auth function to perform the API curl operation and fetach all requested api value
     *
     * @param $email
     * @param $password
     * @param $url
     * @return object|string
     */
    public function getJiraApiResponse($email, $password, $url): object|string
    {
        try {
            $response = Http::withBasicAuth($email, $password)->get($url)->body();
            return json_decode($response);

        } catch( Exception $error ) {
            return $error->getMessage();
        }
    }
}
