package main;
import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;

import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;

public class XML_parser extends DefaultHandler  {

	    List<User> UserL;
	    String UserXmlFileName;
	    String tmpValue;
	    User UserTmp;
	    SimpleDateFormat sdf= new SimpleDateFormat("yy-MM-dd");
	    public void MySaxParser(String UserXmlFileName) {
	        this.UserXmlFileName = UserXmlFileName;
	        UserL = new ArrayList<User>();
	        parseDocument();
	        printDatas();
	    }
	    private void parseDocument() {
	        // parse
	        SAXParserFactory factory = SAXParserFactory.newInstance();
	        try {
	            SAXParser parser = factory.newSAXParser();
	            parser.parse(UserXmlFileName, this);
	        } catch (ParserConfigurationException e) {
	            System.out.println("ParserConfig error");
	        } catch (SAXException e) {
	            System.out.println("SAXException : xml not well formed");
	        } catch (IOException e) {
	            System.out.println("IO error");
	        }
	    }
	    private void printDatas() {
	       // System.out.println(UserL.size());
	        for (User tmpB : UserL) {
	            System.out.println(tmpB.toString());
	        }
	    }
	    public void startElement(String s, String s1, String elementName, Attributes attributes) throws SAXException {
	        // if current element is User , create new User
	        // clear tmpValue on start of element

	        if (elementName.equalsIgnoreCase("User")) {
	            UserTmp = new User();
	            //UserTmp.setId(attributes.getValue("id"));
	            //UserTmp.setLang(attributes.getValue("lang"));
	        }
	        // if current element is publisher
	        if (elementName.equalsIgnoreCase("publisher")) {
	            //UserTmp.setPublisher(attributes.getValue("country"));
	        }
	    }
	    public void endElement(String s, String s1, String element) throws SAXException {
	        // if end of User element add to list
	        if (element.equals("User")) {
	          //  UserL.add(UserTmp);
	        }
	        if (element.equalsIgnoreCase("isbn")) {
	            //UserTmp.setIsbn(tmpValue);
	        }
	        if (element.equalsIgnoreCase("title")) {
	            //UserTmp.setTitle(tmpValue);
	        }
	        if(element.equalsIgnoreCase("author")){
	           //UserTmp.getAuthors().add(tmpValue);
	        }
	        if(element.equalsIgnoreCase("price")){
	            //UserTmp.setPrice(Integer.parseInt(tmpValue));
	        }
	        if(element.equalsIgnoreCase("regDate")){
	            try {
	              //  UserTmp.setRegDate(sdf.parse(tmpValue));
	            } catch (Exception e) {
	                System.out.println("date parsing error");
	            }
	        }
	    }


}
