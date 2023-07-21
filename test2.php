DECLARE
v_header VARCHAR2 (500);
v_body VARCHAR2 (2000);
v_footer VARCHAR2 (500);
v_amount NUMBER DEFAULT 0;


BEGIN
v_header := '<!DOCTYPE html>
<html>
<head>
<style>
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 8px;
}


</style>
</head>
<body>';


FOR h IN (SELECT *
FROM GMS_SUPPLIER
WHERE SUPPLIER_ID = :P7_SUPPLIER_ID)
LOOP
v_body :=
v_body
|| '<table>
<tr> <td>PO NUMBER </td><td>'
|| h.SUPPLIER_NAME
|| '</td><td>VENDOR NAME </td><td>'
|| h.SUPPLIER_NAME
|| '</tr>
<tr> <td>VENDOR SITE NAME </td><td>'
|| h.SUPPLIER_ADDRESS
|| '</td><td>VENDOR CONTACT NAME </td><td>'
|| h.SUPPLIER_ADDRESS
|| '</tr>
<tr> <td>SHIP TO LOCATION </td><td>'
|| h.SUPPLIER_PHNO
|| '</td><td>BILL TO LOCATION </td><td>'
|| h.SUPPLIER_GSTTYPE
|| '</tr>
<tr> <td>TERMS CODE </td><td>'
|| h.SUPPLIER_GSTNO
|| '</td><td>PO DATE </td><td>'
|| h.SUPPLIER_GSTNO
|| '</tr>
</table><br><br>
<table>
<tr> <th>LINE NUM</th> <th>ITEM CODE</th> <th>ITEM DESCRIPTION</th> <th>UOM</th> <th>UNIT PRICE</th> <th>QUANTITY</th> <th>AMOUNT</th></tr>';

FOR l IN ( SELECT *
FROM gms_purchases
WHERE po_header_id = h.po_header_id
ORDER BY LINE_NUM)
LOOP
v_body :=
v_body
|| '<tr> <td>'
|| l.LINE_NUM
|| '</td> <td>'
|| l.ITEM_CODE
|| '</td><td>'
|| l.ITEM_DESCRIPTION
|| '</td><td>'
|| l.UOM
|| '</td><td>'
|| l.UNIT_PRICE
|| '</td><td>'
|| l.QUANTITY
|| '</td><td>'
|| l.AMOUNT
|| '</td>';
v_amount := v_amount + l.amount;
END LOOP;

v_body :=
v_body
|| '<tr> <td></td> <td></td><td></td><td></td><td></td><td>TOTAL:</td><td>'
|| v_AMOUNT
|| '</td>';

v_body := v_body || '</table>';
END LOOP;

v_footer := '</body>
</html>';

HTP.P (v_header || v_body || v_footer);
END;