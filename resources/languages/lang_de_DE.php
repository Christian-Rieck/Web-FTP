<?php

/* -----------------------------------*/
/* ------------>>> ALL <<<------------*/
/* -----------------------------------*/

define("LANG_LINK_LOGOUT", "Ausloggen");
define("LANG_SHOW_ACT_DIR", "Aktuelles Verzeichnis:");
define("LANG_SHOW_UP", "..");
define("LANG_SHOW_LI_UP", "Ordner nach oben");

define("LANG_SHOW_OPEN_DIRECTORY", "Öffne: ");
define("LANG_SHOW_OPTION_DIR_CHMOD", "Berechtigung ändern");
define("LANG_SHOW_OPTION_DIR_DELETE", "Ordner löschen");
define("LANG_SHOW_OPTION_DIR_RENAME", "Ordner Umbenennen");

define("LANG_SHOW_OPTION_FILE_DOWNLOAD", "Herunterladen: ");
define("LANG_SHOW_OPTION_FILE_CHMOD", "Berechtigung ändern");
define("LANG_SHOW_OPTION_FILE_DELETE", "Datei löschen");
define("LANG_SHOW_OPTION_FILE_RENAME", "Datei Umbenennen");
define("LANG_SHOW_OPTION_FILE_EDIT", "Datei bearbeiten");

define("LANG_SHOW_OPTION_NEW_DIRECTORY", "Neuer Ordner");
define("LANG_SHOW_OPTION_NEW_FILE", "Neue Datei");
define("LANG_SHOW_OPTION_UPLOAD", "Datei hochladen");
define("LANG_SHOW_OPTION_SETTINGS", "Einstellungen");

define("LANG_SHOW_OPTION_MULTI_DELETE", "Mehrere löschen");
define("LANG_SHOW_OPTION_DO_MULTI_DELETE", "Ausgewählte löschen"); 

/* -----------------------------------*/
/* ---------->>> ACTIONS <<<----------*/
/* -----------------------------------*/

// Move
define("LANG_ACTION_MOVE_SUCCESS", " wurde erfolgreich verschoben!");

define("LANG_ACTION_MOVE_FAIL", "Fehler beim verschieben! Datei oder Ordner existiert schon?");

// Upload
define("LANG_ACTION_UPLOAD_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_UPLOAD_SUCCESS_AFTER", "\" wurde erfolgreich hochgeladen!");
define("LANG_ACTION_UPLOAD_ZIP_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_UPLOAD_ZIP_SUCCESS_AFTER", "\" wurde erfolgreich hochgeladen und entpackt!");

define("LANG_ACTION_UPLOAD_FAIL", "Fehler beim hochladen der Datei!");
define("LANG_ACTION_UPLOAD_ZIP_FAIL", "Fehler beim hochladen und entpacken der Datei!");

// Edit
define("LANG_ACTION_EDIT_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_EDIT_SUCCESS_AFTER", "\" wurde erfolgreich gespeichert!");

define("LANG_ACTION_EDIT_FAIL_BEFORE", "Fehler beim speichern der Datei \"");
define("LANG_ACTION_EDIT_FAIL_AFTER", "\"!");

// New Directory
define("LANG_ACTION_NEWDIR_SUCCESS_BEFORE", "Der Ordner \"");
define("LANG_ACTION_NEWDIR_SUCCESS_AFTER", "\" wurde erfolgreich angelegt!");

define("LANG_ACTION_NEWDIR_FAIL_NO_AUTHORIZATION", "Fehler beim Anlegen des Ordners! Keine Berechtigung?");
define("LANG_ACTION_NEWDIR_FAIL_NO_NAME", "Kein Ordnername angegeben!");
define("LANG_ACTION_NEWDIR_FAIL_EXISTS", "Eine Datei oder ein Ordner mit dem Namen existiert bereits!");

// New File
define("LANG_ACTION_NEWFILE_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_NEWFILE_SUCCESS_AFTER", "\" wurde erfolgreich angelegt!");

define("LANG_ACTION_NEWFILE_FAIL_NO_AUTHORIZATION", "Fehler beim Anlegen der Datei! Keine Berechtigung?");
define("LANG_ACTION_NEWFILE_FAIL_NO_NAME", "Kein Dateiname angegeben!");
define("LANG_ACTION_NEWFILE_FAIL_EXISTS", "Eine Datei oder ein Ordner mit dem Namen existiert bereits!");

// Rename
define("LANG_ACTION_RENAME_DIR_SUCCESS_BEFORE", "Der Ordner \"");
define("LANG_ACTION_RENAME_DIR_SUCCESS_MIDDLE", "\" wurde erfolgreich in \"");
define("LANG_ACTION_RENAME_DIR_SUCCESS_AFTER", "\" umbenannt!");
define("LANG_ACTION_RENAME_DIR_FAIL_NO_AUTHORIZATION", "Fehler beim Umbenennen des Ordners! Keine Berechtigung?");

define("LANG_ACTION_RENAME_FILE_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_RENAME_FILE_SUCCESS_MIDDLE", "\" wurde erfolgreich in \"");
define("LANG_ACTION_RENAME_FILE_SUCCESS_AFTER", "\" umbenannt!");
define("LANG_ACTION_RENAME_FILE_FAIL_NO_AUTHORIZATION", "Fehler beim Umbenennen der Datei! Keine Berechtigung?");

// Delete
define("LANG_ACTION_MULTIDELETE_SUCCESS", "Die gewählten Dateien und Ordner wurden erfolgreich gelöscht!");

define("LANG_ACTION_DELETE_DIR_SUCCESS_BEFORE", "Der Ordner \"");
define("LANG_ACTION_DELETE_DIR_SUCCESS_AFTER", "\" wurde erfolgreich gelöscht!");

define("LANG_ACTION_DELETE_FILE_SUCCESS_BEFORE", "Die Datei \"");
define("LANG_ACTION_DELETE_FILE_SUCCESS_AFTER", "\" wurde erfolgreich gelöscht!");
				
define("LANG_ACTION_DELETE_DIR_FAIL_NO_AUTHORIZATION", "Fehler beim Löschen des Ordners! Keine Berechtigung?");
define("LANG_ACTION_DELETE_FILE_FAIL_NO_AUTHORIZATION", "Fehler beim Löschen der Datei! Keine Berechtigung?");
define("LANG_ACTION_MULTIDELETE_FAIL_NO_AUTHORIZATION", "Fehler beim Löschen von mehreren Dateien und Ordnern! Keine Berechtigung?");

// Chmod
define("LANG_ACTION_CHMOD_SUCCESS_BEFORE", "Die Berechtigung von \"");
define("LANG_ACTION_CHMOD_SUCCESS_AFTER", "\" wurde erfolgreich geändert!");

define("LANG_ACTION_CHMOD_FAIL_NO_AUTHORIZATION", "Fehler beim Ändern der Berechtigung! Keine Berechtigung?");

// Settings
define("LANG_ACTION_SETTINGS_SAVE_SUCCESS", "Die Einstellungen wurden erfolgreich gespeichert!");

/* -----------------------------------*/
/* ----------->>> LOGIN <<<-----------*/
/* -----------------------------------*/

define("LANG_ANONYMOUS_LOGIN", "Anonym anmelden");
define("LANG_SSL_LOGIN", "SSL Verbindung");
define("LANG_LOGIN", "Einloggen");
define("LANG_LOGIN_ERR_NO_DOMAIN", "Sie müssen eine Domain angeben!");
define("LANG_LOGIN_ERR_NO_USER", "Sie müssen einen Benutzernamen angeben!");
define("LANG_LOGIN_ERR_NO_PASSWORD", "Sie müssen ein Passwort angeben!");

/* -----------------------------------*/
/* -------->>> PROPERTIES <<<---------*/
/* -----------------------------------*/

define("LANG_PROPERTIES_OWNER", "Besitzer:");
define("LANG_PROPERTIES_GROUP", "Gruppe:");
define("LANG_PROPERTIES_LAST_MODIFIED", "Zuletzt bearbeitet:");
define("LANG_PROPERTIES_SIZE", "Dateigröße");
define("LANG_PROPERTIES_CHMOD", "Berechtigung (chmod):");
define("LANG_PROPERTIES_PATH", "Kompletter Pfad");

/* -----------------------------------*/
/* ----------->>> CHMOD <<<-----------*/
/* -----------------------------------*/

define("LANG_CHMOD_OWNER", "Besitzer");
define("LANG_CHMOD_GROUP", "Gruppe");
define("LANG_CHMOD_ALL", "Jeder");

define("LANG_CHMOD_READ", " Lesen");
define("LANG_CHMOD_WRITE", " Schreiben");
define("LANG_CHMOD_EXECUTE", " Ausführen");

define("LANG_CHMOD_BUTTON_CHMOD", "Berechtigung ändern");

/* -----------------------------------*/
/* ---------->>> DELETE <<<-----------*/
/* -----------------------------------*/

define("LANG_DELETE_FILE_BEFORE", "Möchten Sie die Datei ");
define("LANG_DELETE_FILE_AFTER", " wirklich löschen?");

define("LANG_DELETE_DIRECTORY_BEFORE", "Möchten Sie den Ordner ");
define("LANG_DELETE_DIRECTORY_AFTER", " wirklich löschen?");

define("LANG_DELETE_BUTTON_DELETE", "Löschen");

/* -----------------------------------*/
/* ---------->>> MOVE <<<-----------*/
/* -----------------------------------*/

define("LANG_MOVE_BUTTON_MOVE", "Verschieben");

/* -----------------------------------*/
/* ---------->>> RENAME <<<-----------*/
/* -----------------------------------*/

define("LANG_RENAME_BUTTON_RENAME", "Umbenennen");

/* -----------------------------------*/
/* ----------->>> EDIT <<<------------*/
/* -----------------------------------*/

define("LANG_EDIT_BUTTON_SAVE", "Speichern");

/* -----------------------------------*/
/* ------->>> NEW DIRECTORY <<<-------*/
/* -----------------------------------*/

define("LANG_NEW_DIR_HEAD", "Ordner erstellen");

define("LANG_NEW_DIR_DIRECTORY", "Pfad für neuen Ordner: ");
define("LANG_NEW_DIR_BUTTON_CREATE", "Ordner erstellen");

/* -----------------------------------*/
/* --------->>> NEW FILE <<<----------*/
/* -----------------------------------*/

define("LANG_NEW_FILE_HEAD", "Datei erstellen");

define("LANG_NEW_FILE_DIRECTORY", "Pfad für neue Datei: ");
define("LANG_NEW_FILE_BUTTON_CREATE", "Datei erstellen");

/* -----------------------------------*/
/* ---------->>> UPLOAD <<<-----------*/
/* -----------------------------------*/

define("LANG_UPLOAD_HEAD", "Datei hochladen");

define("LANG_UPLOAD_DIRECTORY", "Pfad für hochzuladende Datei:");
define("LANG_UPLOAD_BUTTON_CHOOSE", "Datei auswählen:");
define("LANG_UPLOAD_CHECKBOX_UNZIP", " Datei entzippen?");
define("LANG_UPLOAD_BUTTON_UPLOAD", "Upload!");

/* -----------------------------------*/
/* --------->>> SETTINGS <<<----------*/
/* -----------------------------------*/

define("LANG_SETTINGS_HEAD", "Einstellungen");
define("LANG_SETTINGS_CHOOSE_LANG", "Sprache wählen:");
define("LANG_SETTINGS_SAVE", "Einstellungen speichern");

?>