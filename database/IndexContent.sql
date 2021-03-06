USE [GunzDB]
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[IndexContent](
	[ICID] [int] IDENTITY(1,1) NOT NULL,
	[Type] [tinyint] NULL,
	[Title] [varchar](50) COLLATE Modern_Spanish_CI_AS NULL,
	[User] [varchar](50) COLLATE Modern_Spanish_CI_AS NULL,
	[Date] [datetime] NULL,
	[Text] [varchar](max) COLLATE Modern_Spanish_CI_AS NULL,
 CONSTRAINT [PK_IndexContent] PRIMARY KEY CLUSTERED 
(
	[ICID] ASC
)WITH (PAD_INDEX  = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF