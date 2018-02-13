// Updated: 2018-02-13
package service
import (
    "context"
    "google.golang.org/grpc"
    "log"
    "net"
    pb "myapp/proto"
)
type server struct { pb.UnimplementedUserServiceServer }
func (s *server) GetUser(ctx context.Context, req *pb.GetUserRequest) (*pb.UserResponse, error) {
    return &pb.UserResponse{Id: req.Id, Name: "Agam", Email: "agam@mail.com"}, nil
}
func StartGRPC(addr string) {
    lis, err := net.Listen("tcp", addr)
    if err != nil { log.Fatal(err) }
    s := grpc.NewServer()
    pb.RegisterUserServiceServer(s, &server{})
    log.Printf("gRPC server on %s", addr)
    s.Serve(lis)
}