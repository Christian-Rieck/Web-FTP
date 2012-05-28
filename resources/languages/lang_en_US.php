<?php

/* -----------------------------------*/
/* ------------>>> ALL <<<------------*/
/* -----------------------------------*/

define("LANG_LINK_LOGOUT", "Logout");
define("LANG_SHOW_ACT_DIR", "Actual Path:");
define("LANG_SHOW_UP", "..");
define("LANG_SHOW_UP", "Directory up");

define("LANG_SHOW_OPEN_DIRECTORY", "Open: ");
define("LANG_SHOW_OPTION_DIR_CHMOD", "Change authorization");
define("LANG_SHOW_OPTION_DIR_DELETE", "Delete directory");
define("LANG_SHOW_OPTION_DIR_RENAME", "Rename directory");

define("LANG_SHOW_OPTION_FILE_DOWNLOAD", "Download: ");
define("LANG_SHOW_OPTION_FILE_CHMOD", "Change authorization");
define("LANG_SHOW_OPTION_FILE_DELETE", "Delete file");
define("LANG_SHOW_OPTION_FILE_RENAME", "Rename file");
define("LANG_SHOW_OPTION_FILE_EDIT", "Edit file");

define("LANG_SHOW_OPTION_NEW_DIRECTORY", "New directory");
define("LANG_SHOW_OPTION_NEW_FILE", "New file");
define("LANG_SHOW_OPTION_UPLOAD", "Upload file");
define("LANG_SHOW_OPTION_SETTINGS", "Settings");

define("LANG_SHOW_OPTION_MULTI_DELETE", "Several delete");
define("LANG_SHOW_OPTION_DO_MULTI_DELETE", "Delete selected"); 

/* -----------------------------------*/
/* ---------->>> ACTIONS <<<----------*/
/* -----------------------------------*/

// Move
define("LANG_ACTION_MOVE_SUCCESS", " was successfully moved!");

define("LANG_ACTION_MOVE_FAIL", "Error while moving! File or directory already exists?");

// Upload
define("LANG_ACTION_UPLOAD_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_UPLOAD_SUCCESS_AFTER", "\" was successfully uploaded!");
define("LANG_ACTION_UPLOAD_ZIP_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_UPLOAD_ZIP_SUCCESS_AFTER", "\" was successfully uploaded and unzipped!");

define("LANG_ACTION_UPLOAD_FAIL", "Error while uploading the file!");
define("LANG_ACTION_UPLOAD_ZIP_FAIL", "Error while uploading and unzipping the file!");

// Edit
define("LANG_ACTION_EDIT_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_EDIT_SUCCESS_AFTER", "\" was successfully saved!");

define("LANG_ACTION_EDIT_FAIL_BEFORE", "Error while saving the file \"");
define("LANG_ACTION_EDIT_FAIL_AFTER", "\"!");

// New Directory
define("LANG_ACTION_NEWDIR_SUCCESS_BEFORE", "The directory \"");
define("LANG_ACTION_NEWDIR_SUCCESS_AFTER", "\" was successfully created!");

define("LANG_ACTION_NEWDIR_FAIL_NO_AUTHORIZATION", "Error while creating the directory! No authorization?");
define("LANG_ACTION_NEWDIR_FAIL_NO_NAME", "No directory name entered!");
define("LANG_ACTION_NEWDIR_FAIL_EXISTS", "A file or a directory with this name already exists!");

// New File
define("LANG_ACTION_NEWFILE_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_NEWFILE_SUCCESS_AFTER", "\" was successfully created!");

define("LANG_ACTION_NEWFILE_FAIL_NO_AUTHORIZATION", "Error while creating the file! No authorization?");
define("LANG_ACTION_NEWFILE_FAIL_NO_NAME", "No filename entered!");
define("LANG_ACTION_NEWFILE_FAIL_EXISTS", "A file or a directory with this name already exists!");

// Rename
define("LANG_ACTION_RENAME_DIR_SUCCESS_BEFORE", "The directory \"");
define("LANG_ACTION_RENAME_DIR_SUCCESS_MIDDLE", "\" was successfully renamed to \"");
define("LANG_ACTION_RENAME_DIR_SUCCESS_AFTER", "\"!");
define("LANG_ACTION_RENAME_DIR_FAIL_NO_AUTHORIZATION", "Error while renaming the directory! No authorization?");

define("LANG_ACTION_RENAME_FILE_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_RENAME_FILE_SUCCESS_MIDDLE", "\" was successfully renamed to \"");
define("LANG_ACTION_RENAME_FILE_SUCCESS_AFTER", "\"!");
define("LANG_ACTION_RENAME_FILE_FAIL_NO_AUTHORIZATION", "Error while renaming the file! No authorization?");

// Delete
define("LANG_ACTION_MULTIDELETE_SUCCESS", "The chosen files and directories were successfully deleted!");

define("LANG_ACTION_DELETE_DIR_SUCCESS_BEFORE", "The directory \"");
define("LANG_ACTION_DELETE_DIR_SUCCESS_AFTER", "\" was successfully deleted!");

define("LANG_ACTION_DELETE_FILE_SUCCESS_BEFORE", "The file \"");
define("LANG_ACTION_DELETE_FILE_SUCCESS_AFTER", "\" was successfully deleted!");

define("LANG_ACTION_DELETE_DIR_FAIL_NO_AUTHORIZATION", "Error while deleting the directory! No authorization?");
define("LANG_ACTION_DELETE_FILE_FAIL_NO_AUTHORIZATION", "Error while deleting the file! No authorization?");
define("LANG_ACTION_MULTIDELETE_FAIL_NO_AUTHORIZATION", "Error while deleting several files and directories! No authorization?");

// Chmod
define("LANG_ACTION_CHMOD_SUCCESS_BEFORE", "The authorization from \"");
define("LANG_ACTION_CHMOD_SUCCESS_AFTER", "\" was successfully changed!");

define("LANG_ACTION_CHMOD_FAIL_NO_AUTHORIZATION", "Error while changing the authorization! No authorization?");

// Settings
define("LANG_ACTION_SETTINGS_SAVE_SUCCESS", "The settings were successfully saved!");

/* -----------------------------------*/
/* ----->>> LOGIN / REGISTER <<<------*/
/* -----------------------------------*/

define("LANG_ANONYMOUS_LOGIN", "Anonymous login");
define("LANG_SSL_LOGIN", "SSL connection");
define("LANG_LOGIN", "Login");
define("LANG_REGISTER", "Register");
define("LANG_LOGIN_ERR", "Login failed:");
define("LANG_LOGIN_ERR_NO_DOMAIN", "You must enter a domain!");
define("LANG_LOGIN_ERR_NO_USER", "You must enter a username!");
define("LANG_LOGIN_ERR_NO_PASSWORD", "You must enter a password!");
define("LANG_LOGIN_ERR_BAD_USER_OR_PASSWORD", "You entered a wrong username or password!");

define("LANG_REGISTER_ERR", "Registration failed:");
define("LANG_REGISTER_ERR_NO_USER", "You must enter a username!");
define("LANG_REGISTER_ERR_NO_PASSWORD", "You must enter a password!");
define("LANG_REGISTER_ERR_NO_PASSWORD_REPEAT", "You must repeat your password!");
define("LANG_REGISTER_ERR_PASSWORD_UNEQUAL", "Your passwords are not equal!");
define("LANG_REGISTER_ERR_USERNAME_TO_SHORT", "The username must be at least 3 signs long!");
define("LANG_REGISTER_ERR_PASSWORD_TO_SHORT", "The password must be at least 6 signs long!");
define("LANG_REGISTER_ERR_USERNAME_EXISTS", "This username is already chosen!");
define("LANG_REGISTER_SUCCESS", "Successfully registered!");
define("LANG_REGISTER_FAILED", "Error while registering!");

/* -----------------------------------*/
/* -------->>> PROPERTIES <<<---------*/
/* -----------------------------------*/

define("LANG_PROPERTIES_OWNER", "Owner:");
define("LANG_PROPERTIES_GROUP", "Group:");
define("LANG_PROPERTIES_LAST_MODIFIED", "Last modified:");
define("LANG_PROPERTIES_SIZE", "File size:");
define("LANG_PROPERTIES_CHMOD", "Authorization (chmod):");
define("LANG_PROPERTIES_PATH", "Complete path:");

/* -----------------------------------*/
/* ----------->>> CHMOD <<<-----------*/
/* -----------------------------------*/

define("LANG_CHMOD_OWNER", "Owner");
define("LANG_CHMOD_GROUP", "Group");
define("LANG_CHMOD_ALL", "All");

define("LANG_CHMOD_READ", " Read");
define("LANG_CHMOD_WRITE", " Write");
define("LANG_CHMOD_EXECUTE", " Execute");

define("LANG_CHMOD_BUTTON_CHMOD", "Change authorization"); 

/* -----------------------------------*/
/* ---------->>> DELETE <<<-----------*/
/* -----------------------------------*/

define("LANG_DELETE_FILE_BEFORE", "Do you really like to delete the file ");
define("LANG_DELETE_FILE_AFTER", " ?");

define("LANG_DELETE_DIRECTORY_BEFORE", "Do you really like to delete the directory ");
define("LANG_DELETE_DIRECTORY_AFTER", " ?");

define("LANG_DELETE_BUTTON_DELETE", "Delete");

/* -----------------------------------*/
/* ---------->>> MOVE <<<-----------*/
/* -----------------------------------*/

define("LANG_MOVE_BUTTON_MOVE", "Move");

/* -----------------------------------*/
/* ---------->>> RENAME <<<-----------*/
/* -----------------------------------*/

define("LANG_RENAME_BUTTON_RENAME", "Rename");

/* -----------------------------------*/
/* ----------->>> EDIT <<<------------*/
/* -----------------------------------*/

define("LANG_EDIT_BUTTON_SAVE", "Save");

/* -----------------------------------*/
/* ------->>> NEW DIRECTORY <<<-------*/
/* -----------------------------------*/

define("LANG_NEW_DIR_HEAD", "Create directory");

define("LANG_NEW_DIR_DIRECTORY", "Path for new directory: ");
define("LANG_NEW_DIR_BUTTON_CREATE", "Create Directory");

/* -----------------------------------*/
/* --------->>> NEW FILE <<<----------*/
/* -----------------------------------*/

define("LANG_NEW_FILE_HEAD", "Create file");

define("LANG_NEW_FILE_DIRECTORY", "Path for new file: ");
define("LANG_NEW_FILE_BUTTON_CREATE", "Create file");

/* -----------------------------------*/
/* ---------->>> UPLOAD <<<-----------*/
/* -----------------------------------*/

define("LANG_UPLOAD_HEAD", "Upload file");

define("LANG_UPLOAD_DIRECTORY", "Path for uploading file:");
define("LANG_UPLOAD_BUTTON_CHOOSE", "Choose file:");
define("LANG_UPLOAD_CHECKBOX_UNZIP", " Unzip file?");
define("LANG_UPLOAD_BUTTON_UPLOAD", "Upload!");

/* -----------------------------------*/
/* --------->>> SETTINGS <<<----------*/
/* -----------------------------------*/

define("LANG_SETTINGS_HEAD", "Settings");
define("LANG_SETTINGS_CHOOSE_LANG", "Choose language:");
define("LANG_SETTINGS_SAVE", "Save settings");

/* -----------------------------------*/
/* ----------->>> UCP <<<-------------*/
/* -----------------------------------*/

define("LANG_UCP_TITLE", "Web-FTP :: User Control Panel");

define("LANG_UCP_HEADER", "User Control Panel");

define("LANG_UCP_MENU_OVERVIEW", "Overview");
define("LANG_UCP_MENU_HISTORY", "History");
define("LANG_UCP_MENU_SERVER", "Server");
define("LANG_UCP_MENU_SETTINGS", "Settings");

?>