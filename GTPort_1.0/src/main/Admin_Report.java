package main;

import javax.servlet.http.HttpServlet;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@Path("Admin_Report")
public class Admin_Report extends HttpServlet {

	@Path("Report")
	//@Produces("text/plain")
	@POST
	public String Report(String xml){
		System.out.println(xml);
		return "";
	}
}
