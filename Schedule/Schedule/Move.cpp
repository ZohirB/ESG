#include <bits/stdc++.h>
using namespace std;

void copy_from_st_to_file(){
    string line;
    //For writing text file
    //Creating ofstream & ifstream class object
    ifstream ini_file {"Old_Schedule.txt"};
    ofstream out_file {"New_Schedule.txt"};


    while(getline(ini_file,line)){
        cout << line << endl;
    }

    //Closing file
    ini_file.close();
    out_file.close();
}

int main(){
    copy_from_st_to_file();
    cout << "Copy Finished \n";
}
