# DailyCred php Class
So using DailyCred couldn't get much easier there clear and easy to understand documentation 
rocks, but heres a php class that follows the OAUTH flow to make it even easier. 



## How to use

Add your client_id and client_secret to the class

Link to Sign In url:

>$signin_url = $Object->generate_url("signin");

Link to Sign Up url:

>$signup_url = $Object->generate_url("signup");

Exchanging code for access_token and retrieving graph data:

> Check if code has been returned and get data from graph:
>> if(isset($_GET['code'])){
>>
>> $code = $_GET['code'];
>>
>>$graph = $Object->graph_request($code); //Returns graph json
>>
>>//Get data from graph

>> $userEmail = $graph->email;

>>}



#### Check out DailyCred at http://dailycred.com

