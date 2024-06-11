<?php

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SymfonyDocs
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    /**
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function fetchGitHubInformation(): array
    {
        $response = $this->client->request('POST', 'https://example.com/api/post', [
            'headers' => [
                'Content-Type' => 'multipart/form-data'
            ],
            'body' => json_encode(['key' => 'value']),
        ]);

        $statusCode = $response->getStatusCode();
        // $statusCode = 200

        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'

        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }

    public function generatePdf(string $htmlContent): string
    {
        $response = $this->httpClient->post($this->gotenbergBaseUrl . '/convert/html', [
            'multipart' => [
                [
                    'name' => 'files',
                    'contents' => $htmlContent,
                    'filename' => 'document.html',
                ],
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
