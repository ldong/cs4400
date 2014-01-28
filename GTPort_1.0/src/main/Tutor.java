package main;

import javax.servlet.http.HttpServlet;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@Path("/Tutor")
public class Tutor extends HttpServlet{

	@Path("/addTutor")
	//@Produces("text/plain")
	@POST
	public String addTutor(String xml){
		System.out.println(xml);
		return "";
	}
}
