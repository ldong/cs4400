package main;

import java.util.LinkedList;

import javax.servlet.http.HttpServlet;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

@Path("/Student_Report")
public class Student_Report extends HttpServlet {
	LinkedList<String> teacher;
	LinkedList<String> courseName;
	LinkedList<String> courseCode;
	LinkedList<String> averageGrade;
	@Path("/Report")
	//@Produces("text/plain")
	@POST
	public String Report(String xml){
		System.out.println(xml);
		return "";
	}
	
	public String generateReport(String admin){
		String returnXML = "";
		for(int i = 0; i < teacher.size(); i++){
			returnXML += "<teacher>"+ teacher.get(i)+"<teacher>";
		}
		for(int i = 0; i < courseName.size(); i++){
			returnXML += "<courses>"+ courseName.get(i)+"<courses>";
		}
		for(int i = 0; i < courseCode.size(); i++){
			returnXML += "<courses>"+ courseCode.get(i)+"<courses>";
		}
		for(int i = 0; i < courseName.size(); i++){
			returnXML += "<courses>"+ averageGrade.get(i)+"<courses>";
		}
		return returnXML;
	}
}
