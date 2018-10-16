# Apache Thrift

Apache Thrift是一个跨语言的服务部署框架，通过一个中间语言(IDL, 接口定义语言)来定义RPC的接口和数据类型，然后通过一个编译器生成不同语言的代码（支持C++，Java，Python，PHP, GO，Javascript，Ruby，Erlang，Perl， Haskell， C#等）,并由生成的代码负责RPC协议层和传输层的实现。

Thrift的PHP类库位于thrift/lib/php/lib/Thrift目录下面，Thrift对于数据传输格式、数据传输方式，服务器模型均做了定义，方便自行扩展。


# 数据传输格式（protocol）

数据传输格式（protocol）是定义的了传输内容，对Thrift Type的打包解包，包括

TBinaryProtocol，二进制格式，TBinaryProtocolAccelerated则是依赖于thrift_protocol扩展的快速打包解包。
TCompactProtocol，压缩格式
TJSONProtocol，JSON格式
TMultiplexedProtocol，利用前三种数据格式与支持多路复用协议的服务端（同时提供多个服务，TMultiplexedProcessor）交互

# 数据传输方式

数据传输方式（transport），定义了如何发送（write）和接收（read）数据，包括

TBufferedTransport，缓存传输，写入数据并不立即开始传输，直到刷新缓存。
TSocket，使用socket传输
TFramedTransport，采用分块方式进行传输，具体传输实现依赖其他传输方式，比如TSocket
TCurlClient，使用curl与服务端交互
THttpClient，采用stream方式与HTTP服务端交互
TMemoryBuffer，使用内存方式交换数据
TPhpStream，使用PHP标准输入输出流进行传输
TNullTransport，关闭数据传输
TSocketPool在TSocket基础支持多个服务端管理（需要APC支持），自动剔除无效的服务器
TNonblockingSocket，非官方实现非阻塞socket

# 服务模型

服务模型，定义了当PHP作为服务端如何监听端口处理请求

TForkingServer，采用子进程处理请求
TSimpleServer，在TServerSocket基础上处理请求
TNonblockingServer，基于libevent的非官方实现非阻塞服务端，与TNonblockingServerSocket，TNonblockingSocket配合使用

# 一些工厂

另外还定义了一些工厂，以便在Server模式下对数据传输格式和传输方式进行绑定

TProtocolFactory，数据传输格式工厂类，对protocol的工厂化生产，包括TBinaryProtocolFactory，TCompactProtocolFactory，TJSONProtocolFactory
TTransportFactory，数据传输方式工厂类，对transport的工厂化生产，作为server时，需要自行实现
TStringFuncFactory，字符串处理工厂类


# 服务端创建的步骤

首先初始化服务提供者handler

然后利用该handler初始化自动生成的processor

初始化数据传输方式transport

利用该传输方式初始化数据传输格式protocol

开始服务


# 客户端调用的步骤

初始化数据传输方式transport，与服务端对应

利用该传输方式初始化数据传输格式protocol，与服务端对应

实例化自动生成的Client对象

开始调用


# Thrift作为一个跨语言的服务框架

其他文件便是异常，字符串处理，自动加载器的定义等等。

Thrift作为一个跨语言的服务框架，方便不同语言、模块之间互相调用，解耦服务逻辑代码，拓展了PHP的处理能力（如与Hbase交互），使得WEB架构更具弹性。与基于 SOAP 消息格式的 Web Service和基于 JSON 消息格式的 RESTful 服务不同，Thrif数据传输格式默认采用二进制传格式，对 XML 和 JSON 体积更小，但对于服务端的CPU占用比JSON、XML要高。PHP虽然有thrift_protocol扩展，但仅仅作为二进制数据传输格式化使用，其他文件的加载仍然为PHP，需要更多的开销。

如果由PHP来做为Thrift的服务端，仅仅这样子做仍然是不够的，Thrift仅仅实现的数据定义和传输，未实现RPC架构

需要避免重复加载各类文件，是否做成PHP扩展
数据传输格式和方式是否适需要自行扩展
客户端要能够自动连可使用的服务端，剔除失效的服务器
服务端需要处理客户端并发情况，是否多进程/异步处理
服务端需要监控服务是否正常
workerman-thrift-rpc对这些问题进行了解决，基于thrift提供了一个可靠性的RPC框架。对客户端和服务端的调用做了封装，提供统一入口，利用workerman做socket中转，当客户端发出请求时，将给socket转给服务端使用，提供服务。workerman-json-rpc与workerman-thrift-rpc类似，采用异步（分步）收发，但简单多了，更像是一种约定。数据格式，发送时仅发送class，function，parameters三个参数，接收时，仅code，msg，data三个返回值，在格式约束及跨语言上，需要自行处理；不需要thrift那样依赖于生成器所生成的文件，客户端完全独立于服务端。