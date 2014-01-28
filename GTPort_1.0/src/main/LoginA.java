package main;
import javax.servlet.http.HttpServlet;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@SuppressWarnings("serial")
@Path("/Loginadsf")
public class LoginA extends HttpServlet {

	//@Path("/verify")
	//@Produces("text/plain")
	@POST
	public String verify(String xml){
		System.out.println(xml);
		return "";
	}
}
