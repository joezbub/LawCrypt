<?php
    $filename = $_POST['filename'];
    $file_suff = substr($filename, 0, strrpos($filename, '.', -1));
    $split_dst = "/Users/josephz/downloads/programming/attorney_secret_sharing/lawcrypt.github.io/uploads/";
    $split_src = "/Users/josephz/";
    $tmp = $split_src . "Dropbox/Lawyer_Data/" . $file_suff . "-key-1.txt";
    shell_exec("mv $tmp $split_dst");
    $tmp = $split_src . "GoogleDrive/Lawyer_Data/" . $file_suff . "-key-2.txt";
    shell_exec("mv $tmp $split_dst");
    $tmp = $split_src . "OneDrive/Lawyer_Data/" . $file_suff . "-key-3.txt";
    shell_exec("mv $tmp $split_dst");

    $tmp = $split_src . "Dropbox/Lawyer_Data/" . $file_suff . "-split-1.txt";
    shell_exec("mv $tmp $split_dst");
    $tmp = $split_src . "GoogleDrive/Lawyer_Data/" . $file_suff . "-split-2.txt";
    shell_exec("mv $tmp $split_dst");
    $tmp = $split_src . "OneDrive/Lawyer_Data/" . $file_suff . "-split-3.txt";
    shell_exec("mv $tmp $split_dst");

    $run_name = "uploads/" . $filename;
    shell_exec("./main -decrypt $run_name");
    shell_exec("rm $filename");
    shell_exec("mv ". $split_dst . $file_suff . "-combined-shares.txt /Users/josephz/Dropbox/Lawyer_Data/Demo");
    header("Location: combine.html");
?>