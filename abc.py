import requests
headers = {'Content-Type': 'application/json',
                   'appid': '129',
                   'deviceId': 'SYS',
                   'operator': 'etisalatdcb',
                   'Access_token': 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI5NzE4ODg4ODg4ODgiLCJleHAiOjE2NjQxMDE3ODMsImlhdCI6MTY2MTUwOTc4M30.mWdmkYPPCt1hKhOoaCmwEehDZShvGVmedG1VAxJ-dDunz-xKFkhnRhm1zsPdXqt5d-mzJTX23sEER423lcJoBg',
                   'channel': 'WAP',
                   'Msisdn': '971888888888'
                   }
print('headers1:', headers)
url = 'https://mv1.in/ContentManager2/v1/fetchHomePage'
res = requests.get(url, headers=headers)
if res.status_code == 200:
    json_dict = res.json()
else:
    pass  # Handle other errors
print(json_dict)