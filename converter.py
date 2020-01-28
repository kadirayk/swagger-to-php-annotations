import json
import sys

if len(sys.argv) < 3:
    print("invalid command args")
    print("usage: python .\\converter.py .\\input.json .\\output.php")
    exit(-1)

input_file = sys.argv[1]  # swagger json
output_file = sys.argv[2]  # php file

with open(input_file, 'r') as input:
    doc = json.load(input)

# info
info = doc['info']
output = open(output_file, "w")
output.write('<?php\n\n/**\n'
             ' * @OA\Info(title="' + info['title'] + '", version="' + info['version'] + '")\n'
                                                                                        ' * ' + info[
                 'description'] + '\n'
                                  ' */\n')

# paths
paths = doc['paths']
for path_name in paths:
    path = paths[path_name]
    for method in path.keys():
        output.write('/**\n')
        output.write(' *@OA\\' + method.title() + '(\n')
        output.write(' *\tpath="' + path_name + '",\n')
        output.write(' *\ttags={')

        # tags
        tags = path[method]['tags']
        tag_str = ''
        for tag in tags:
            tag_str += '"' + tag + '",'
        tag_str = tag_str[:-1]
        output.write(tag_str + '},\n')

        output.write(' *\tsummary="' + path[method]['summary'].rstrip() + '",\n')
        output.write(' *\tdescription="' + path[method]['description'].rstrip() + '",\n')

        # parameters
        parameters = path[method]['parameters']
        for param in parameters:
            output.write(' *\t@OA\\Parameter(\n')
            output.write(' *\t\tname="' + param['name'] + '",\n')
            output.write(' *\t\tin="' + param['in'] + '",\n')
            output.write(' *\t\ttype="' + param['type'] + '",\n')
            if 'format' in param:
                output.write(' *\t\tformat="' + param['format'] + '",\n')
            output.write(' *\t\tdescription="' + param['description'] + '",\n')
            output.write(' *\t\trequired="' + str(param['required']).lower() + '",\n')
            output.write(' *\t),\n')

        # responses
        responses = path[method]['responses']
        for response_code in responses.keys():
            output.write(' *\t@OA\\Response(\n')
            output.write(' *\t\tresponse=' + response_code + ',\n')
            output.write(' *\t\tdescription="' + responses[response_code]['description'].replace('\n', '\\n') + '",\n')
            # schema
            if 'schema' in responses[response_code]:
                schema = responses[response_code]['schema']
                output.write(' *\t\t@OA\\JsonContent(\n')
                if 'type' in schema:
                    output.write(' *\t\t\ttype="' + schema['type'] + '",\n')
                if 'properties' in schema:
                    properties = schema['properties']
                    for prop in properties.keys():
                        output.write(' *\t\t\t@OA\\Property(\n')
                        output.write(' *\t\t\t\tproperty="' + prop + '",\n')
                        output.write(' *\t\t\t\tref="' + properties[prop]['$ref'].replace('/definitions/',
                                                                                          '/components/schemas/') + '",\n')
                        output.write(' *\t\t\t),\n')
                if '$ref' in schema:
                    output.write(
                        ' *\t\t\tref="' + schema['$ref'].replace('/definitions/', '/components/schemas/') + '",\n')
                if 'examples' in responses[response_code]:
                    output.write(
                        ' *\t\t\texample=' + json.dumps(
                            responses[response_code]['examples']['application/json']).replace('"{', '{').replace('}"',
                                                                                                                 '}').replace(
                            '\\n', '\n *\t\t\t').replace('\\"', '"') + '\n')
                output.write(' *\t\t),\n')
            output.write(' *\t),\n')
        output.write(' *)\n')
        output.write(' */\n\n')

# definitions
definitions = doc['definitions']
for name in definitions:
    definition = definitions[name]
    output.write('/**\n')
    output.write(' *@OA\\Schema(\n')
    output.write(' *\tschema="' + name + '",\n')
    if 'type' in definition:
        output.write(' *\ttype="' + definition['type'] + '",\n')
    if 'properties' in definition:
        properties = definition['properties']
        for prop in properties.keys():
            output.write(' *\t@OA\\Property(\n')
            output.write(' *\t\tproperty="' + prop + '",\n')
            if 'type' in properties[prop]:
                output.write(' *\t\ttype="' + properties[prop]['type'] + '",\n')
            if 'description' in properties[prop]:
                output.write(' *\t\tdescription="' + properties[prop]['description'] + '",\n')
            if '$ref' in properties[prop]:
                output.write(
                    ' *\t\tref="' + properties[prop]['$ref'].replace('/definitions/', '/components/schemas/') + '",\n')
            output.write(' *\t),\n')
        output.write(' *)\n')
    output.write(' */\n\n')

output.close()
