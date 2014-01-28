package main;
import javax.servlet.http.HttpServlet;

import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@SuppressWarnings("serial")
@Path("/CreateUseradsf")
public class CreateUsera extends HttpServlet {

	//@Path("/create")
	//@Produces("application/xml")
	@POST
	public String create(String xml){
		System.out.println(xml);
		return "";
	}
}
