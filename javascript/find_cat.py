import json

def find_item_name(category_number):
    filename = r"C:\Users\cpiss\OneDrive\Documents\cloud files\CEID\CEID_4ο έτος\7ο εξαμηνο\Παγκοσμιος Ιστος\web_project_2024\products.json"
    data= json.load(open(filename, 'r'))
    for item in data:
        data = json.load(filename)
        for item in data:
            if item['category'] == category_number:
                return item['name']
        return None

category_number = 123  # Replace with the desired category number
item_name = find_item_name(category_number)
if item_name:
    print(f"The name of the item with category number {category_number} is {item_name}.")
else:
    print(f"No item found with category number {category_number}.")