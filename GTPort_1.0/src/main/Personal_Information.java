package main;

import javax.servlet.http.HttpServlet;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@Path("/PersonalInformation")
public class Personal_Information extends HttpServlet {

	@Path("/addingPersonalInformation")
	//@Produces("text/plain")
	@POST
	public void addingPersonalInformation(String xml){
		
		System.out.println(xml);
	}
}
