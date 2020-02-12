import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import org.apache.http.Header;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.ParseException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.google.gson.JsonElement;
import com.google.gson.JsonParser;

public class OAuthConnect {

    public static void test() {
        try {
            HttpClient httpclient = HttpClientBuilder.create().build();  // the http-client, that will send the request
            HttpGet httpGet = new HttpGet("https://api.broadsign.com:10889/rest/api_user/v12/self");   // the http GET request
            httpGet.addHeader("Authorization", "Bearer 071439fcc7aa4d23552401a4d62f5f69"); // add the authorization header to the request
            
            //httpGet.addHeader("Data", "Bearer 7b3ddaddd6a851b2c120a27a47aeafd9");
            //post.setEntity(entity);
            
            /*
            
            HttpPost post = new HttpPost("https://api.broadsign.com:10889/rest/user/v11/self");
             
            List<NameValuePair> params = new ArrayList<NameValuePair>(2);
            params.add(new BasicNameValuePair("param-1", "12345"));
            params.add(new BasicNameValuePair("param-2", "Hello!"));
            post.setEntity(new UrlEncodedFormEntity(params, "UTF-8"));
            
            
            
            HttpResponse postRes = httpclient.execute(post);
            HttpEntity entity = postRes.getEntity();
            
            
            */
            
            
            
            HttpResponse response = httpclient.execute(httpGet); // the client executes the request and gets a response
            System.out.println(response);
            int responseCode = response.getStatusLine().getStatusCode();  // check the response code
            switch (responseCode) {
                case 200: { 
                    // everything is fine, handle the response
                    String stringResponse = EntityUtils.toString(response.getEntity());  // now you have the response as String, which you can convert to a JSONObject or do other stuff
                    break;
                }
                case 500: {
                    // server problems ?
                    break;
                }
                case 403: {
                    // you have no authorization to access that resource
                    break;
                }
            }
        } catch (IOException | ParseException ex) {
            // handle exception
        }
    }
    
    
    public static void jsonGet() {
    	jsonGet( "b7f241acb072f484f0a79ea9889d1d03",  "display_unit/v12?domain_id=259890691", "");
    }
    public static void jsonGet(String token, String command, String json) {
    	HttpClient httpClient = HttpClientBuilder.create().build();
    	
    	try {
    		HttpGet request = new HttpGet("https://api.broadsign.com:10889/rest/"+command);
    		
    		request.addHeader("Authorization", "Bearer "+token);
    		;
    		System.out.println(request);
    		StringEntity params = new StringEntity(json);
    		//request.addHeader("content-type", "application/x-www-form-urlencoded");
    	
            
    		
            HttpResponse response = httpClient.execute(request);
            response.setEntity(params);
           
          
    		HttpEntity httpEntity = response.getEntity();
    		
    		String apiOutput = EntityUtils.toString(httpEntity);
    		//System.out.println("HEADERS:");
    		List<Header> httpHeaders = Arrays.asList(response.getAllHeaders());
            //httpHeaders.stream().forEach(System.out::println);
            System.out.println(apiOutput.toString());
            System.out.println(response.toString());
            Gson gson = new GsonBuilder().setPrettyPrinting().create();
            JsonParser jp = new JsonParser();
            
            JsonElement je = jp.parse(apiOutput);
            
            String prettyJsonString = gson.toJson(je);
            System.out.println(prettyJsonString);
    	}catch(Exception e) {
    		e.printStackTrace();
    	}
    }
    public static void jsonPost() {
    	jsonPost( "b7f241acb072f484f0a79ea9889d1d03",  "api_user/v12/self", "");//user/v11/self
    	//jsonPost( "7b3ddaddd6a851b2c120a27a47aeafd9",  "container/v9/add", "{ \"container_id\": 0, \"domain_id\": 0, \"group_id\": 0, \"name\": \"FROMAPI\", \"parent_id\": 0, \"parent_resource_type\": \"string\"}");
    	
    }
    
    public static void jsonPost(String token, String command, String json) {
    	
    	
    	HttpClient httpClient = HttpClientBuilder.create().build(); //Use this instead 

    	try {

    	    HttpPost request = new HttpPost("https://api.broadsign.com:10889/rest/"+command);
    	    request.addHeader("Authorization", "Bearer "+token); // add the authorization header to the request
    	    System.out.println(request.toString());
    	    //StringEntity params =new StringEntity("{ \"container_id\": 0, \"domain_id\": 0, \"group_id\": 0, \"name\": \"FROMAPI\", \"parent_id\": 0, \"parent_resource_type\": \"string\"}");
    	    StringEntity params =new StringEntity(json);
    	    
    	    request.addHeader("content-type", "application/x-www-form-urlencoded");
    	   request.setEntity(params);
    	   
    	    HttpResponse response = httpClient.execute(request);

    	    //handle response here...
    	    	System.out.println(response);
    	}catch (Exception ex) {

    	    //handle exception here

    	} finally {
    	    //Deprecated
    	    //httpClient.getConnectionManager().shutdown(); 
    	}
    	
    	
    }
    
    
}