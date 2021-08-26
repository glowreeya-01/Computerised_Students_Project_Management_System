/* Disable foreign keys */
PRAGMA foreign_keys = 'off';

/* Begin transaction */
BEGIN;

/* Database properties */
PRAGMA auto_vacuum = 0;
PRAGMA encoding = 'UTF-8';
PRAGMA page_size = 4096;

/* Drop table [events] */
DROP TABLE IF EXISTS [main].[events];

/* Table structure [events] */
CREATE TABLE [main].[events](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [user_id] integer NOT NULL, 
  [title] varchar, 
  [category] varchar, 
  [start] datetime, 
  [updated_at] datetime, 
  [created_at] datetime);

/* Drop table [failed_jobs] */
DROP TABLE IF EXISTS [main].[failed_jobs];

/* Table structure [failed_jobs] */
CREATE TABLE [main].[failed_jobs](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [uuid] varchar NOT NULL, 
  [connection] text NOT NULL, 
  [queue] text NOT NULL, 
  [payload] text NOT NULL, 
  [exception] text NOT NULL, 
  [failed_at] datetime NOT NULL DEFAULT CURRENT_TIMESTAMP);
CREATE UNIQUE INDEX [main].[failed_jobs_uuid_unique] ON [failed_jobs]([uuid]);

/* Drop table [migrations] */
DROP TABLE IF EXISTS [main].[migrations];

/* Table structure [migrations] */
CREATE TABLE [main].[migrations](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [migration] varchar NOT NULL, 
  [batch] integer NOT NULL);

/* Drop table [notifications] */
DROP TABLE IF EXISTS [main].[notifications];

/* Table structure [notifications] */
CREATE TABLE [main].[notifications](
  [id] varchar PRIMARY KEY NOT NULL, 
  [type] varchar NOT NULL, 
  [notifiable_type] varchar NOT NULL, 
  [notifiable_id] integer NOT NULL, 
  [data] text NOT NULL, 
  [read_at] datetime, 
  [created_at] datetime, 
  [updated_at] datetime);
CREATE INDEX [main].[notifications_notifiable_type_notifiable_id_index]
ON [notifications](
  [notifiable_type], 
  [notifiable_id]);

/* Drop table [password_resets] */
DROP TABLE IF EXISTS [main].[password_resets];

/* Table structure [password_resets] */
CREATE TABLE [main].[password_resets](
  [email] varchar NOT NULL, 
  [token] varchar NOT NULL, 
  [created_at] datetime);
CREATE INDEX [main].[password_resets_email_index] ON [password_resets]([email]);

/* Drop table [profiles] */
DROP TABLE IF EXISTS [main].[profiles];

/* Table structure [profiles] */
CREATE TABLE [main].[profiles](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [user_id] integer NOT NULL, 
  [department] varchar DEFAULT 'Not set', 
  [gender] varchar DEFAULT 'Not set', 
  [phone] varchar DEFAULT 'Not set', 
  [image] varchar, 
  [DoB] datetime, 
  [qualification] varchar DEFAULT 'Not set', 
  [experience] varchar DEFAULT 'Not set', 
  [address] text DEFAULT 'Not set', 
  [city] varchar DEFAULT 'Not set', 
  [state] varchar DEFAULT 'Not set', 
  [zipcode] varchar DEFAULT 'Not set', 
  [country] varchar DEFAULT 'Not set', 
  [topic] varchar DEFAULT 'Not set', 
  [bio] text DEFAULT 'about me', 
  [updated_at] datetime, 
  [created_at] datetime);

/* Drop table [projects] */
DROP TABLE IF EXISTS [main].[projects];

/* Table structure [projects] */
CREATE TABLE [main].[projects](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [user_id] integer NOT NULL, 
  [filename] varchar NOT NULL, 
  [recipient] varchar, 
  [topic] varchar, 
  [file] varchar NOT NULL, 
  [comment] text, 
  [label] varchar, 
  [status] integer NOT NULL DEFAULT '1', 
  [created_at] datetime, 
  [updated_at] datetime, 
  [deleted_at] datetime);

/* Drop table [users] */
DROP TABLE IF EXISTS [main].[users];

/* Table structure [users] */
CREATE TABLE [main].[users](
  [id] integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
  [user_id] integer DEFAULT '1' REFERENCES [users]([id]), 
  [firstname] varchar NOT NULL, 
  [lastname] varchar NOT NULL, 
  [email] varchar NOT NULL, 
  [reg_no] varchar NOT NULL, 
  [status] integer NOT NULL DEFAULT '1', 
  [isAdmin] tinyint(1) NOT NULL DEFAULT '0', 
  [role] integer NOT NULL, 
  [password] varchar NOT NULL, 
  [created_at] datetime, 
  [updated_at] datetime);
CREATE UNIQUE INDEX [main].[users_email_unique] ON [users]([email]);
CREATE UNIQUE INDEX [main].[users_reg_no_unique] ON [users]([reg_no]);

/* Table data [events] Record count: 0 */

/* Table data [failed_jobs] Record count: 0 */

/* Table data [migrations] Record count: 7 */
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(1, 1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(2, 2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(3, 3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(4, 4, '2021_05_27_060731_create_profiles_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(5, 5, '2021_05_27_060808_create_projects_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(6, 6, '2021_05_27_060835_create_events_table', 1);
INSERT INTO [migrations]([rowid], [id], [migration], [batch]) VALUES(7, 7, '2021_05_28_181440_create_notifications_table', 1);

/* Table data [notifications] Record count: 34 */
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(1, '7b5789f6-3727-426e-bb40-45fa046c5347', 'App\Notifications\RequestNotification', 'App\Models\User', 1, '{"username":"Teacher 1","email":"teacher@gmail.com","filename":"first","file":"com.docx","label":"Chapter"}', '2021-07-06 17:16:31.000', '2021-07-06 17:06:09.000', '2021-07-06 17:16:31.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(2, 'f25e9968-eaae-4d8b-8e9a-3cb1caf6ff13', 'App\Notifications\NewProjectNotification', 'App\Models\User', 4, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', null, '2021-07-06 17:07:10.000', '2021-07-06 17:07:10.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(3, 'a368b38b-038e-4ba7-ad56-09e02067b330', 'App\Notifications\NewProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', '2021-07-06 17:16:31.000', '2021-07-06 17:07:10.000', '2021-07-06 17:16:31.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(4, '4a60a4f9-2b06-404b-aefe-8cc367075b67', 'App\Notifications\NewProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', '2021-07-06 17:16:31.000', '2021-07-06 17:07:10.000', '2021-07-06 17:16:31.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(5, 'd1b4e043-6fa5-4310-8ee5-18a7d2432c1f', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', '2021-07-06 17:16:31.000', '2021-07-06 17:07:57.000', '2021-07-06 17:16:31.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(6, 'c032b254-feed-4d47-bb5e-b824c881b64d', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 4, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', null, '2021-07-06 17:07:57.000', '2021-07-06 17:07:57.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(7, '3772345a-2e7f-4f7f-bd2a-5119fce5016b', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_AL.txt","label":"Chapter"}', '2021-07-06 17:16:30.000', '2021-07-06 17:07:58.000', '2021-07-06 17:16:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(8, 'f8b3b61f-2b1c-40ea-ada5-149663d5737a', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', '2021-07-06 17:16:30.000', '2021-07-06 17:08:24.000', '2021-07-06 17:16:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(9, '400b97bf-73a4-42ab-88ca-c1c5da5e5cd3', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 4, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', null, '2021-07-06 17:08:24.000', '2021-07-06 17:08:24.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(10, '69fd376c-1db7-43f1-98a0-c31be05abc25', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', '2021-07-06 17:16:30.000', '2021-07-06 17:08:24.000', '2021-07-06 17:16:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(11, '0bec589b-2239-42bb-b895-75fd34dbdeac', 'App\Notifications\DeletedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', '2021-07-06 17:16:30.000', '2021-07-06 17:15:06.000', '2021-07-06 17:16:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(12, '297eb0cb-7dce-4dc6-b001-71b8f5a26aa1', 'App\Notifications\DeletedProjectNotification', 'App\Models\User', 4, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', null, '2021-07-06 17:15:06.000', '2021-07-06 17:15:06.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(13, 'e0f3f287-613a-4e8c-9595-78b40491fcb1', 'App\Notifications\DeletedProjectNotification', 'App\Models\User', 1, '{"filename":"the","file":"Teacher_an input device.docx","label":"Chapter"}', '2021-07-06 17:16:30.000', '2021-07-06 17:15:06.000', '2021-07-06 17:16:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(14, 'f581d091-3004-418f-b4aa-0f930038210a', 'App\Notifications\DeletedUserNotification', 'App\Models\User', 1, '{"firstname":"Teacher2","lastname":"2","email":"teacher2@gmail.com","reg_no":"1232312"}', '2021-07-06 17:19:54.000', '2021-07-06 17:16:53.000', '2021-07-06 17:19:54.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(15, 'e5c6021d-06b1-447f-be26-8a30fd03a2e9', 'App\Notifications\NewUserNotification', 'App\Models\User', 1, '{"firstname":"Festus","lastname":"Ezeilo","email":"gozie1996@gmail.com","reg_no":"201921"}', null, '2021-07-06 17:45:28.000', '2021-07-06 17:45:28.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(16, '3d29559e-3540-49ed-9918-298f1637b840', 'App\Notifications\RequestNotification', 'App\Models\User', 1, '{"username":"Festus Ezeilo","email":"gozie1996@gmail.com","filename":"first","file":"com.docx","label":"Chapter"}', null, '2021-07-11 13:04:59.000', '2021-07-11 13:04:59.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(17, '271def54-460c-4812-9806-ee64803e57d9', 'App\Notifications\NewProjectNotification', 'App\Models\User', 7, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:05:48.000', '2021-07-11 13:05:48.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(18, 'f8b1d069-607e-4ffa-9339-413c98a3c642', 'App\Notifications\NewProjectNotification', 'App\Models\User', 1, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:05:48.000', '2021-07-11 13:05:48.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(19, 'd3c87c9c-b53d-49f3-b499-0d479c138ff1', 'App\Notifications\NewProjectNotification', 'App\Models\User', 1, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:05:48.000', '2021-07-11 13:05:48.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(20, '8ca834f2-6f8f-4a83-85ad-11e57a9610a0', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:06:28.000', '2021-07-11 13:06:28.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(21, 'bb3ec883-e7c5-4ce2-905d-452a6655359d', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 7, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:06:28.000', '2021-07-11 13:06:28.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(22, '5684eeba-3556-4c03-93dc-0e2a7fb739e8', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"first","file":"Festus_202.docx","label":"Chapter"}', null, '2021-07-11 13:06:28.000', '2021-07-11 13:06:28.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(23, '130ae04f-503f-4811-93f7-94e596e1824c', 'App\Notifications\NewUserNotification', 'App\Models\User', 1, '{"firstname":"chigozie","lastname":"Ezeilo","email":"gozie199@gmail.com","reg_no":"2017\/245885"}', null, '2021-07-19 10:10:48.000', '2021-07-19 10:10:48.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(24, '5977a6f5-065c-404c-85b6-8f50b3daac10', 'App\Notifications\UpdatedUserNotification', 'App\Models\User', 8, '{"firstname":"chigozie","lastname":"Ezeilo","email":"gozie199@gmail.com","reg_no":"2017\/245885"}', null, '2021-07-19 10:13:18.000', '2021-07-19 10:13:18.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(25, '5437e391-fa9d-4235-a384-4861500dfb5b', 'App\Notifications\NewUserNotification', 'App\Models\User', 1, '{"firstname":"Emmauel","lastname":"Nwangwu","email":"emmauel@gmail.com","reg_no":"36488"}', null, '2021-07-19 10:18:24.000', '2021-07-19 10:18:24.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(26, 'f8b6c4ef-9498-45e3-b083-197131284273', 'App\Notifications\UpdatedUserNotification', 'App\Models\User', 8, '{"firstname":"chigozie","lastname":"Ezeilo","email":"gozie199@gmail.com","reg_no":"2017\/245885"}', null, '2021-07-19 10:19:08.000', '2021-07-19 10:19:08.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(27, '52627d42-b9b0-428c-9082-330b77765341', 'App\Notifications\UpdatedUserNotification', 'App\Models\User', 9, '{"firstname":"Emmauel","lastname":"Nwangwu","email":"emmauel@gmail.com","reg_no":"36488"}', null, '2021-07-19 10:20:19.000', '2021-07-19 10:20:19.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(28, 'db122986-0703-4778-990c-c0b9b481c4a7', 'App\Notifications\NewProjectNotification', 'App\Models\User', 8, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:23:29.000', '2021-07-19 10:23:29.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(29, 'd5ad9a3a-f77a-47aa-b839-bc652c3a0ce4', 'App\Notifications\NewProjectNotification', 'App\Models\User', 9, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:23:29.000', '2021-07-19 10:23:29.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(30, '19ed78bb-2caf-40b9-8aa1-850143ec3bb5', 'App\Notifications\NewProjectNotification', 'App\Models\User', 1, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:23:30.000', '2021-07-19 10:23:30.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(31, '7e622ec0-9573-4658-8b29-3778e668a3f2', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 1, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:24:14.000', '2021-07-19 10:24:14.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(32, 'ab8020bb-e0fb-4d8f-af13-1515c1c39a66', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 9, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:24:14.000', '2021-07-19 10:24:14.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(33, '28f3f5d1-d66b-430e-b81e-86374c387809', 'App\Notifications\UpdatedProjectNotification', 'App\Models\User', 8, '{"filename":"Chapter 1","file":"chigozie_50 questions.docx","label":"Chapter"}', null, '2021-07-19 10:24:14.000', '2021-07-19 10:24:14.000');
INSERT INTO [notifications]([rowid], [id], [type], [notifiable_type], [notifiable_id], [data], [read_at], [created_at], [updated_at]) VALUES(34, '26a6c345-b8b9-4722-990b-9db7e39edc0e', 'App\Notifications\RequestNotification', 'App\Models\User', 1, '{"username":"chigozie Ezeilo","email":"gozie199@gmail.com","filename":"first","file":"com.docx","label":"Chapter"}', null, '2021-07-19 10:25:34.000', '2021-07-19 10:25:34.000');

/* Table data [password_resets] Record count: 0 */

/* Table data [profiles] Record count: 9 */
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(1, 1, 1, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:05:24.000', '2021-07-06 17:05:24.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(2, 2, 2, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:05:25.000', '2021-07-06 17:05:25.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(3, 3, 3, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:05:25.000', '2021-07-06 17:05:25.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(4, 4, 4, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:05:26.000', '2021-07-06 17:05:26.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(5, 5, 5, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:05:27.000', '2021-07-06 17:05:27.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(6, 6, 6, null, 'Female', null, null, null, null, null, null, null, null, null, null, 'Not set', null, '2021-07-06 17:17:58.000', '2021-07-06 17:17:58.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(7, 7, 7, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-06 17:45:27.000', '2021-07-06 17:45:27.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(8, 8, 8, 'Not set', 'Not set', 'Not set', 'chigozie_.jpg', null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'ICT in Nigeria', 'about me', '2021-07-19 10:19:08.000', '2021-07-19 10:10:43.000');
INSERT INTO [profiles]([rowid], [id], [user_id], [department], [gender], [phone], [image], [DoB], [qualification], [experience], [address], [city], [state], [zipcode], [country], [topic], [bio], [updated_at], [created_at]) VALUES(9, 9, 9, 'Not set', 'Not set', 'Not set', null, null, 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'Not set', 'about me', '2021-07-19 10:18:24.000', '2021-07-19 10:18:24.000');

/* Table data [projects] Record count: 11 */
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(1, 1, 1, 'first', 'Admin', 'the humam mind', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:32.000', '2021-07-06 17:05:32.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(2, 2, 1, 'secound', 'Admin', 'area of the a triangle', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:32.000', '2021-07-06 17:05:32.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(3, 3, 1, 'third', 'Admin', 'the first thing the mind thinks', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(4, 4, 2, 'first', 'Admin', 'mind energy of the student this days', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(5, 5, 2, 'secound', 'Admin', 'the new summit on point', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(6, 6, 2, 'third', 'Admin', 'the step to having a great life before 30', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(7, 7, 3, 'first', 'Admin', 'the social media and its merits', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(8, 8, 3, 'secound', 'Admin', 'the social status of the university of Nigeria', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:33.000', '2021-07-06 17:05:33.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(9, 9, 3, 'third', 'Admin', 'secound term election of the president of SUG', 'com.docx', 'very good', 'Chapter', 1, '2021-07-06 17:05:34.000', '2021-07-06 17:05:34.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(11, 11, 7, 'first', 'Admin Admin', 'Not set', 'Festus_202.docx', 'pls sir this is my chapter 1', 'Chapter', 1, null, '2021-07-11 13:06:28.000', null);
INSERT INTO [projects]([rowid], [id], [user_id], [filename], [recipient], [topic], [file], [comment], [label], [status], [created_at], [updated_at], [deleted_at]) VALUES(12, 12, 8, 'Chapter 1', 'Emmauel Nwangwu', 'ICT in Nigeria', 'chigozie_50 questions.docx', 'pls sir this is my ASM assignment', 'Chapter', 2, null, '2021-07-19 10:24:14.000', null);

/* Table data [users] Record count: 8 */
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(1, 1, 1, 'Admin', 'Admin', 'admin@gmail.com', '232993', 1, 1, 2, '$2y$10$/Kyl0OnM8.VMsxW4gb7iHe29sqp9ToijHTB6pRzN.1w.hiQqlpoOS', '2021-07-06 17:05:24.000', '2021-07-06 17:05:24.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(2, 2, 1, 'Student', '1', 'stud@gmail.com', '164662', 1, 0, 1, '$2y$10$8TrYKGSFn8pNWrESnyyh.OjHxYCnKDYh.Ox5GXC26y4ZIrvvnawIa', '2021-07-06 17:05:24.000', '2021-07-06 17:05:24.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(3, 3, 1, 'Stdent', '2', 'stud2@gmail.com', '90543', 1, 0, 1, '$2y$10$9yjedmOZOSc.0t09ohXIcOsOVuHmA08fGArW3EhZVeSzBPUaIJZRa', '2021-07-06 17:05:25.000', '2021-07-06 17:05:25.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(4, 4, 1, 'Teacher', '1', 'teacher@gmail.com', '67267320', 1, 0, 2, '$2y$10$4JVB2rel5tCpJIkqncezweLGIqU.K5e0AhI1fCTxf7iezAZFCIVLq', '2021-07-06 17:05:26.000', '2021-07-06 17:05:26.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(6, 6, 2, 'yuk', 'rfg', 'author@gmail.com', 'e4422', 1, 0, 2, '$2y$10$EKz0rYvfsYT4zyLtth6CMeItET2XSjZdGE9JM7RGSd0DGZDmRge86', '2021-07-06 17:17:58.000', '2021-07-06 17:17:58.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(7, 7, 1, 'Festus', 'Ezeilo', 'gozie1996@gmail.com', '201921', 1, 0, 1, '$2y$10$zQClzMmjAs11WJBZdEl8TuZIulA4979Yq7yhgNl1Wq3NcH5vX60Q.', '2021-07-06 17:45:27.000', '2021-07-06 17:45:27.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(8, 8, 9, 'chigozie', 'Ezeilo', 'gozie199@gmail.com', '2017/245885', 1, 0, 1, '$2y$10$zMG9dp0r3wspAllbH2fDPe/Q.2EkEqzGb7yqkQ34c1HKqmfjB2CF.', null, '2021-07-19 10:19:08.000');
INSERT INTO [users]([rowid], [id], [user_id], [firstname], [lastname], [email], [reg_no], [status], [isAdmin], [role], [password], [created_at], [updated_at]) VALUES(9, 9, 8, 'Emmauel', 'Nwangwu', 'emmauel@gmail.com', '36488', 1, 0, 2, '$2y$10$bTLvV.FUG.j6Ko9zYpHtoOEIyr9JueVM3Q2ckEpijeEc7RgA8Jbrm', '2021-07-19 10:18:24.000', '2021-07-19 10:20:18.000');

/* Commit transaction */
COMMIT;

/* Enable foreign keys */
PRAGMA foreign_keys = 'on';
