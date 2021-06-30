# Postal-PIN-Code-API
**pincode.php**
1) Get the pincode from the user.
2) Next we concatenate the URL and the pincode together and assign it to a variable.
3) Then we initialize the curl, set the curl option with the URL variable, execute the curl and close the curl.
4) From the above action we will recieve the output from the curl in json format, hence we convert it to an array using **json_decode** function.
5) After that we get the branch name, branch type  and the details of the pincode.
6) The Details column is an url if we select that it redirects to the details.php page where we get the details for a particular branch.

**details.php**
1) From the pincode.php page we get the pincode and the branch name using the **get method**.
2) Next we concatenate the URL and the pincode together and assign it to a variable.
3) Then we initialize the curl, set the curl option with the URL variable, execute the curl and close the curl.
4) From the above action we will recieve the output from the curl in json format, hence we convert it to an array using **json_decode** function.
5) After that we get the post office name, post office, district, division, taluk, state and pincode of a particular area.
