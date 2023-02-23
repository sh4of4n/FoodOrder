<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Member</title>
            </head>
            <body>
                <xsl:apply-templates/>
            </body>
        </html>
    </xsl:template>
    
    <xsl:template match="member">
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Member Name</th>
                <th>Date of Birth</th>
                <th>Contact</th>
                <th>Email</th>
                <th width="200px">Address</th>
                <th>Actions</th>
            </tr>
            <xsl:for-each select="person">
                <tr>
                    <td><xsl:value-of select="position()"/>.</td>
                    <td><xsl:value-of select="name"/></td>
                    <td><xsl:value-of select="date"/></td>
                    <td><xsl:value-of select="contact"/></td>
                    <td><xsl:value-of select="email"/></td>
                    <td><xsl:value-of select="address"/></td>
                    <td>
                        <a class="btn-secondary">
                            <xsl:attribute name="href">
                                <xsl:value-of select="concat('updateMember.php?name=',name)"/>
                            </xsl:attribute>
                            Update Member
                        </a>
                        <a class="btn-danger">
                            <xsl:attribute name="href">
                                <xsl:value-of select="concat('deleteMember.php?name=',name)"/>
                            </xsl:attribute>
                            Delete Member
                        </a>
                    </td>
                </tr>
            </xsl:for-each>
            
            </table>
    </xsl:template>

</xsl:stylesheet>
