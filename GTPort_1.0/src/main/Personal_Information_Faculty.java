package main;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@Path("/PersonalInformationFaculty")
public class Personal_Information_Faculty {

	@Path("/addingPersonalInformation")
	//@Produces("text/plain")
	@POST
	public void addingPersonalInformation(String xml){
		
		System.out.println(xml);
	}
}
