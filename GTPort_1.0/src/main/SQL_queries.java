package main;

public class SQL_queries {

	//login
	public String getUser(String user, String password){
		String userInfo= "SLECECT Username FROM User WHERE EXISTS (SELECT * FROM User  WHERE User.Username =" + user + " AND User.Password ="+ password +")";
		return "";
	}
	//creditals
	public void createUser(String user, String password){
		String userInfo = "INSERT INTO User VALUES (" + user +"," + password+ ") WHERE NOT EXISTS (SELECT * FROM User WHERE User.Username =" + user+")";
	}
	//personal information
	public void createStudentGeneralInfo(String $Username,String $Address,String $Name,String $Email_Id,String $DOB,String $Permanent_Address,String $Gender,String $Contact_No){
		String createInfo = "INSERT INTO Regular_User VALUES ("+$Username+","+ $Address+","+ $Name+","+ $Email_Id+","+ $DOB+","+ $Permanent_Address+","+ $Gender+","+ $Contact_No+") WHERE NOT EXIST (SELECT Username FROM Regular_User WHERE Regular_User.Username ="+ $Username+")";
	}
	//Bring courses the student registered before, and the Grades earned are B or higher:
	public String courseStudentHadRegistered(String $Username){
		String query = "SELECT CCode.Code AS SelectedTutorCourseCode FROM CCode WHERE CCode.Title IN (SELECT Title FROM Section JOIN Registers ON Section.CRN = Registers.CRN WHERE Registers.Username =" + $Username+" AND Registers.Grade IN (‘A’, ‘B’))";
		return "";
		}
	
	//Add apply_to_tutor info:
	public String returnTutorInfo(String $SelectedTutorCourseCode, String $Username, String $SelectedTutorTitle){
		String query = "SELECT Title AS SelectedTutorTitle FROM CCode WHERE CCode.Code IN" + $SelectedTutorCourseCode + "INSERT INTO Applied_To_Tutor_For VALUES (" + $Username+ ","+ $SelectedTutorTitle+")";
		return "";
	}
	//View major info:
	public String viewMajor(){
		String query = "SELECT Department.Name AS MajorSelectionForStudents FROM Department";
		return "";
	}
	//Create major info:
	public void createMajor(String $Username,String $SelectedMajor,String $Degree){
		String query = "INSERT INTO Student (Username, Major, Degree) VALUES("+$Username+","+ $SelectedMajor+","+ $Degree+")";
	}
	//Create education history:
	public void createEducationHistory(String $Username,String $Year_Of_Grad,String $Name_Of_School,String $Major,String $Degree,String $GPA){
		String query = "INSERT INTO Education_History VALUES ("+ $Username+","+ $Year_Of_Grad+","+ $Name_Of_School+","+ $Major+","+ $Degree+","+ $GPA+") WHERE (SELECT COUNT(*) FROM Education_History WHERE Education_History_Username ="+ $Username+")<=3";
	}
	//Bring general info:
	public String bringGeneralInfo(String $Username){
		String query = "SELECT Address, Name, Email_Id, DOB, Permanent_Adrress, Gender, Contact_No FROM Regular_User WHERE Regular.Username ="+ $Username+"";
		return "";
	}
	//Bring general info:
	public void updateGeneralInfo(String $Email_Id, String $DOB, String $Permanent_Address, String  $Gender, String $Contact_No, String $Username, String $Address, String $Name){
		String query = "UPDATE Regular_User SET Address = "+$Address+","+ "Name = "+ $Name + ",Email_Id = "+$Email_Id+", DOB ="+ $DOB+", Permanent_Address = "+$Permanent_Address+", Gender ="+ $Gender+", Contact_No = "+$Contact_No+" WHERE Regular_User.Username ="+ $Username+"";
	}
	//Bring courses the student registered before, and the Grades earned are B or higher:
	public String bringCoursesStudentsRegisteredBefore(String $Username){
		String query = "SELECT CCode.Code AS SelectedTutorCourseCode FROM CCode WHERE CCode.Title IN (SELECT Title FROM Section JOIN Registers ON Section.CRN = Registers.CRN WHERE Registers.Username = "+$Username+" AND Registers.Grade IN (‘A’, ‘B’))";
		return "";
	}
	
	//Add apply_to_tutor info:
	public String getTutorInfo(String $SelectedTutorCourseCode){
		String query = "SELECT Title AS SelectedTutorTitle FROM CCode WHERE CCode.Code IN"+ $SelectedTutorCourseCode +"";
		return "";
	}

	//for each selectedTutorTitle
	public String insertTutorInformation(String $Username, String $SelectedTutorTitle ){
		String query = "INSERT INTO Applied_To_Tutor_For VALUES ("+$Username+","+ $SelectedTutorTitle+")";
		return "";
	}
	
	//find the key “title” for oringinal added course codes, name as OriginalTitle
	//Delete apply_to_tutor info:
	//Select changed applied tutor course:
	public String deleteApplyToTutorCode(String $SelectedTutorCourseCode){
		String query = "SELECT Title AS OriginalTitle FROM CCode WHERE CCode.Code ="+ $SelectedTutorCourseCode+"";
		return "";
	}
	
	//find out newly applied tutor course title, name as changedTitle
	//Selected original applied tutor course:
	public String selectOriginalAppliedTutor(String $Username){
		String query = "SELECT Title AS changedTitle FROM Applied_To_Tutor_For WHERE Applied_To_Tutor_For.Username ="+ $Username+"";
		return "";
	}
	
	//Deletingthe applied tutor works with query above
	public String deleteselectedQuery(){
		String query = "DELETE FROM Applied_To_Tutor_For WHERE Applied_To_Tutor_For.Title IN (‘OriginalTitle’ EXCEPT ‘changedTitle’)";
		return "";
	}
	
	//view major info
	public String viewMajorInfo(String $Username){
		String query = " SELECT Major, Degree FROM Student WHERE Student.Username ="+ $Username +"";
		return "";
	}
	
	//Update major info:
	public String getStudentMajorInfor(String $Degree, String  $Username){
		String query = "UPDATE Student SET Major = $Major, Degree ="+ $Degree+ "WHERE Student.Username "+ $Username+"";
		return "";
	}
}
