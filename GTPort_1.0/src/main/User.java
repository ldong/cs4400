package main;
import java.io.IOException;
import java.io.StringReader;
import java.sql.Date;
import java.util.Collection;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.Map;
import java.util.Set;

import javax.swing.text.Document;
import javax.swing.text.html.parser.DTD;
import javax.swing.text.html.parser.DocumentParser;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.xml.sax.InputSource;
import org.xml.sax.SAXException;


public class User {
	String userName = "";
	String password = "";
	String major = "";
	String degree = "";
	LinkedList<String> listOfTutors;
	String gpa = "";
	Date dateOfBirth;
	Map<String, String> coursesAndGrades;
	String email;
	String permantAddress;
	String gender;
	String name;
	String contactNo;
	
	public String creatingXMLUser(){
		String xml = "";
		xml += "<user>";
		xml += "<username>"+ userName+"</username>";
		xml += "<password>"+ password+"</password>";
		xml += "<major>"+ major+"</major>";
		xml += "<degree>"+ degree+"</degree>";
		xml += "<gpa>"+ gpa+"</gpa>";
		xml += "<dateOfBirth>"+ dateOfBirth.toString()+"</dateOfBirth>";
		xml += "<email>"+ email+"</email>";
		xml += "<permantAddress>"+ permantAddress+"</permantAddress>";
		xml += "<gender>"+ gender+"</gender>";
		xml += "<name>"+ name+"</name>";
		xml += "<contactNo>"+ contactNo+"</contactNo>";
		for(int i = 0; i < listOfTutors.size(); i++){
			xml+= "<tutors>"+listOfTutors.get(i) + "</tutors>";
		}
		Set<String> c = coursesAndGrades.keySet();
		Iterator<String> newIterator =  c.iterator();
		while(newIterator.hasNext()){
			String tempCourse = newIterator.next();
			String tempGpa = coursesAndGrades.get(newIterator);
			xml+= "<course>" +tempCourse+","+ tempGpa + "</course>";
		}
		xml += "</user>";
		return xml;
	}
	
	public void parsingUserXML(String xml) throws SAXException, IOException, ParserConfigurationException{
		//Document doc = new Document(xml);
		DocumentBuilderFactory factory = 
				   DocumentBuilderFactory.newInstance();
				InputSource source = new InputSource( new StringReader(xml));
				Document document =  (Document) factory.newDocumentBuilder().parse(source); 

    }
}
