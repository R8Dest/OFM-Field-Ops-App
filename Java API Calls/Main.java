import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URL;

import javax.net.ssl.HttpsURLConnection;

public class Main {

	
	private final String USER_AGENT = "Mozilla/5.0";
	
	public static void main(String[] args) {

		Main m = new Main();
		OAuthConnect aoc = new OAuthConnect();
		
		aoc.jsonGet();
		//aoc.test();
		

	}
	
	
	
	
	private void sendPost() throws Exception {

		String url = "https://api.broadsign.com:10889/rest/api_user/v11/self";
		URL obj = new URL(url);
		HttpsURLConnection con = (HttpsURLConnection) obj.openConnection();

		//add reuqest header
		con.setRequestMethod("POST");
		con.setRequestProperty("User-Agent", USER_AGENT);
		con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");
		con.setRequestProperty("Authorization", "Bearer 7b3ddaddd6a851b2c120a27a47aeafd9");
		

		//String urlParameters = "sn=C02G8416DRJM&cn=&locale=&caller=&num=12345";
		//String urlParameters = "Authorization: Bearer 7b3ddaddd6a851b2c120a27a47aeafd9";
		
		// Send post request
		con.setDoOutput(true);
		DataOutputStream wr = new DataOutputStream(con.getOutputStream());
		//wr.writeBytes(urlParameters);
		wr.flush();
		wr.close();

		int responseCode = con.getResponseCode();
		System.out.println("\nSending 'POST' request to URL : " + url);
		//System.out.println("Post parameters : " + urlParameters);
		System.out.println("Response Code : " + responseCode);

		BufferedReader in = new BufferedReader(
		        new InputStreamReader(con.getInputStream()));
		String inputLine;
		StringBuffer response = new StringBuffer();

		while ((inputLine = in.readLine()) != null) {
			response.append(inputLine);
		}
		in.close();
		
		//print result
		System.out.println(response.toString());

	}
	
	public void pcTest() {
		String command = "curl -H \\\"Authorization: Bearer 7b3ddaddd6a851b2c120a27a47aeafd9\\\" -s https://api.broadsign.com:10889/rest/user/v11/self";
		
		
		
		try {
			
			
			
			Process process = Runtime.getRuntime().exec(command);
			process.getInputStream();
			
			process.destroy();
			
			
		} catch (IOException e) {

			e.printStackTrace();
		}
	}

}
