<?php

/*This is where you decide who does what*/

/*
  UserMembershipTypeID UserMembershipTypeI UserMembershipTypeDescription 
      1 Guest A guest user is a user that has not yet had his me...
      2 Default Default user, no major priviledges 
      3 Moderator Moderator has some priviledged on users 
      4 Owner Has all priviledges 
 UserMembershipStatusID UserMembershipStatus UserMembershipStatusDescription 
      1 Full A full member has passed moderation 
      2 Waiting When a member is awaiting acceptance of registrati...
      3 Removed When membership is removed to a member (banned) ba... 

Define a File Level: 

FileLevel[$i] can be used by $UserType=$i not regarding of selected dataset. 
OwnFileLevel[$i] can be used by $userType = $i if they are part of their dataset.
To Do : include here a function to decide of view of File depending of these values... 

Using that system, there is no need for the following switch statement


*/

switch ($UserType) {
	case '1':  //a guest User

		$isReviewed = '0';        //Reviewed links when added to database
	        $UpdateRight = '0';       //Right to update some Any information
	        $UpdateOwnRight = '0';     //Right to update Own information
	        $AddRight = '0';           //Right to add information
	        $DeleteRight = '0';        //Right to delete information
                $SetMembersRights = '0';   //Moderate new members
                $SetModerators = '0';      //Right to set a or remove member as Moderator


             		break;
        case '2':  // a default user
		$isReviewed = '1';        //Reviewed links when added to database
                $UpdateRight = '0';       //Right to update some Any information
	        $UpdateOwnRight = '1';     //Right to update Own information
	        $AddRight = '1';           //Right to add information
	        $DeleteRight = '0';        //Right to delete information
                $SetMembersRights = '0';   //Moderate new members
                $SetModerators = '0';     //Right to set a or remove member as Moderator

		break;

        case '3':  // a Moderator
		$isReviewed = '1';        //Reviewed links when added to database
	        $UpdateRight = '1';       //Right to update some Any information
	        $UpdateOwnRight = '1';     //Right to update Own information
	        $AddRight = '1';           //Right to add information
	        $DeleteRight = '1';        //Right to delete information
                $SetMembersRights = '1';   //Moderate new members
                $SetModerators = '0';      //Right to set a or remove member as Moderator

		break;

        case '4':  // a owner
		$isReviewed = '1';        //Reviewed links when added to database
	        $UpdateRight = '1';       //Right to update some Any information
	        $UpdateOwnRight = '1';     //Right to update Own information
	        $AddRight = '1';           //Right to add information
	        $DeleteRight = '1';        //Right to delete information
                $SetMembersRights = '1';   //Moderate new members
                $SetModerators = '1';      //Right to set a or remove member as Moderator

		break;
	default :
	        $isReviewed = '0';        //Link added but need to be reviewed before entered in db
	        $UpdateRight = '0';       //Right to update some Any information
	        $UpdateOwnRight = '0';     //Right to update Own information
	        $AddRight = '0';           //Right to add information
	        $DeleteRight = '0';        //Right to delete information
                $SetMembersRights = '0';   //Moderate new members
                $SetModerators = '0';      //Right to set a or remove member as Moderator
	        break;
 }
if ($UserStatus >1) {
// a banned member has no rights make sure all above values are set to 0 again!:
	        $isReviewed = '0';        //Link added but need to be reviewed before entered in db
	        $UpdateRight = '0';       //Right to update some Any information
	        $UpdateOwnRight = '0';     //Right to update Own information
	        $AddRight = '0';           //Right to add information
	        $DeleteRight = '0';        //Right to delete information
                $SetMembersRights = '0';   //Moderate new members
                $SetModerators = '0';     //Right to set a or remove member as Moderator
                $UserType = '1';          //in case moderator forgot torevoke priviledges of banned user, the interface does it.



}

?>

