# Swagger\Client\DefaultApi

All URIs are relative to *https://api.preflightapi.com/api/rest/Services*

Method | HTTP request | Description
------------- | ------------- | -------------
[**doPreflightFormatPagesModeGet**](DefaultApi.md#doPreflightFormatPagesModeGet) | **GET** /DoPreflight/{format}/{pages}/{mode}/ | Basic method


# **doPreflightFormatPagesModeGet**
> \Swagger\Client\Model\InlineResponse200 doPreflightFormatPagesModeGet($authorization, $content_type, $format, $pages, $mode)

Basic method

PreflightAPI

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | BASIC autorization
$content_type = "/path/to/file.txt"; // \SplFileObject | File
$format = "format_example"; // string | dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters
$pages = "pages_example"; // string | Max page number. All additional pages will be removed. Default \"1\"
$mode = "mode_example"; // string | Mode - default \"1\"

try {
    $result = $apiInstance->doPreflightFormatPagesModeGet($authorization, $content_type, $format, $pages, $mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->doPreflightFormatPagesModeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| BASIC autorization |
 **content_type** | **\SplFileObject**| File |
 **format** | **string**| dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters |
 **pages** | **string**| Max page number. All additional pages will be removed. Default \&quot;1\&quot; |
 **mode** | **string**| Mode - default \&quot;1\&quot; |

### Return type

[**\Swagger\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

