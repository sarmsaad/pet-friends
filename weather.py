import json
import requests

API_KEY = "201052e6fed21d9e6487b5082d72c915"

PRIMARY = "http://api.openweathermap.org/data/2.5/weather"

# This takes a city as input
def weather(location):
    url = "{}?q={}&APPID={}".format(PRIMARY,location, API_KEY)
    response = requests.get(url)
    df = response.json()
    temp = round(df["main"]["temp"] - 273.15,2)
    humidity = df["main"]["humidity"]
    condition = df["weather"][0]["main"]
    weather_list = [temp] + [humidity] + [condition]
    return weather_list

# A function to round up the temperatures
def round_up(x, place):
    return round(x + 5 * 10**(-1 * (place + 1)), place)

def running_decision(temp):
    # Checking weather conditions for running
    if temp[0] >= 14.0 and temp[0] <= 25.0 and temp[1] <= 60 and temp[2] not in ['Drizzle', 'Rain', 'Snow']:
        print("Good weather to run")
    elif temp[0] >= 14.0 and temp[0] <= 25.0 and temp[1] >= 60 and temp[2] not in ['Drizzle', 'Rain', 'Snow']:
        print("Okay weather to run but humid")
    elif temp[0] < 14.0 and temp[0] >= 7.0 and temp[1] >= 50 and temp[2] not in ['Drizzle', 'Rain', 'Snow']:
        print("Slightly cold to run")
    elif temp[0] < 7.0:
        print("Running not advised at this weather")
    elif temp[2] in ['Drizzle', 'Rain', 'Snow']:
        print("Do not go running now!")
    elif temp[0] > 25.0 and temp[0] <= 30.0 and temp[2] not in ['Drizzle', 'Rain', 'Snow']:
        print("Might be hot to run")
    else:
        print("Too hot to go running now. Try a gym.")



if __name__ == "__main__":
    print(weather("London"))
    print(weather("Boston"))
    print(weather("Bangalore"))
    print(weather("Oslo"))
    temp = weather("Bangalore")
    running_decision(temp)
    # make a call to obtain lat and long
    # getting lat and long as floats and then converting to string
    # maps_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + str(lat) + str(long)
    # maps_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=37.77,-122.4"
    # response = requests.get(maps_url)
    # df = response.json()
    # address = df["results"][0]["formatted_address"]
    # print(weather(address.split(',')[-3]))






