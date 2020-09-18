USE [GunzDB]
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[CoinsShop](
	[GCIID] [int] IDENTITY(1,1) NOT NULL,
	[ItemID] [int] NULL,
	[ItemIDHead] [int] NULL,
	[ItemIDChest] [int] NULL,
	[ItemIDHands] [int] NULL,
	[ItemIDPants] [int] NULL,
	[ItemIDFeet] [int] NULL,
	[ItemType] [varchar](64) NULL,
	[Sex] [varchar](64) NULL,
	[ItemLv] [int] NULL,
	[Price] [int] NOT NULL,
	[IsCompleteSet] [tinyint] NOT NULL,
	[WebImg] [varchar](64) NULL,
	
 CONSTRAINT [PK_CoinsShop] PRIMARY KEY CLUSTERED 
(
	[GCIID] ASC
)WITH (PAD_INDEX  = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF